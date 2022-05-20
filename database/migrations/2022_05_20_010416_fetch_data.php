<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Get data HTML.
        $request_uri = 'http://mip-prd-web.azurewebsites.net/CustomDataDownload?LatestValue=false&Applicable=applicableFor&FromUtcDatetime=2022-01-01T00:00:00.000Z&ToUtcDateTime=2022-05-20T00:00:00.000Z&PublicationObjectStagingIds=PUBOBJ1660,PUBOB4507,PUBOB4508,PUBOB4510,PUBOB4509,PUBOB4511,PUBOB4512,PUBOB4513,PUBOB4514,PUBOB4515,PUBOB4516,PUBOB4517,PUBOB4518,PUBOB4519,PUBOB4521,PUBOB4520,PUBOB4522,PUBOBJ1661,PUBOBJ1662'; // hardcoded, could be stored better
        $html = file_get_contents($request_uri);
        $html = substr($html, strpos($html, "<!DOCTYPE html>"));
        $dom = new DOMDocument;
        $dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        
        // Extract rows from HTML.
        $area_pos = strlen('Calorific Value, ');
        $items = $xpath->evaluate('//html/body/table/tbody/tr/td');
        for ($i = 0; $i < count($items); $i += 6)
        {
            // Applicable For
            $node = $items->item($i + 1);
            $date = DateTime::createFromFormat('d/m/Y', $node->nodeValue);
        
            // Location
            $node = $items->item($i + 2);
            $area = substr($node->nodeValue, $area_pos);
        
            // Value
            $node = $items->item($i + 3);
            $val = floatval($node->nodeValue);
        
            // Retrieve location id.
            $area_col = DB::table('locations')
                ->where('name', $area);
                
            // Create location if new.
            if ($area_col->count() <= 0) {
                $area_id = DB::table('locations')->insertGetId([
                    'name' => $area,
                ]);
            } else {
                $area_id = $area_col->value('id');
            }

            // Store CV.
            DB::table('calorific_values')->insert([
                'applicable_for' => $date,
                'location_id' => $area_id,
                'value' => $val,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('calorific_values')->truncate();
        DB::table('locations')->truncate();
    }
};
