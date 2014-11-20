<?php


class DepartmentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('departments')->delete();
        $departments = [
            [ 
                'name' => 'Administrative Training Institute', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Agriculture (Crop Husbandry)', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Agriculture (Research & Education)', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Animal Husbandry & Veterinary', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Art & Culture', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Chakma Autonomous District Council', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Cooperation', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Disaster Management & Rehabilitation', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Economics & Statistics', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Environment & Forest', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Finance (Fiscal Management Unit)', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Fire & Emergency Service', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Fisheries', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Food, Civil Supplies & Consumer Affairs', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Forensic Science Lab', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'General Administration Department', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'General Administration Department (Aviation)', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Geology & Mineral Resources', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Health Services', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Higher & Technical Education', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Horticulture', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Hospital & Medical Education', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Industries', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Information & Communication Technology', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Information & Public Relations', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Labour & Employment', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Lai Autonomous District Council', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Land Revenue & Settlement', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Law & Judicial', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Legal Metrology', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Local Area Development', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Mara Autonomous District Council', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Minor Irrigation', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Mizoram Scholarship Board', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Planning and Programme Implementation Department', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Police Housing', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Power & Electricity', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Printing & Stationary', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Prisons', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Public Health Engineering', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Public Works Department', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Rural Development', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Sainik Welfare & Resettlement', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'School Education', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Science, Technology & Environment', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Sericulture', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Sinlung Hill District Council', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Social Welfare', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Soil & Water Conservation', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Sports & Youth Services', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'State Council of Educational Research & Training', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Tourism', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Town & Country Planning', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Trade & Commerce', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Transport', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Urban Development & Poverty Alleviation', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Local Administration Department', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Finance (Institutional Finance & State Lottery)', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ], 
            [ 
                'name' => 'Taxation', 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ]
        ];
        DB::table('departments')->insert($departments);
    }

} 