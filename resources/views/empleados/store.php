<!-- Store -->

$rules = array(
            'responsible' => 'string|required|max:100',
            'year' => 'numeric|required|max:9999',
            'modality' => 'numeric|required|max:32767',
            // 'dncp_pac_id' => 'numeric|required|max:2147483647',
            'dncp_pac_id' => 'numeric|nullable|max:2147483647',
            'begin_date' => 'date_format:d/m/Y|nullable',
            'sub_program' => 'numeric|required|max:32767',
            'funding_source' => 'numeric|required|max:32767',
            'financial_organism' => 'numeric|required|max:32767',
            // 'total_amount' => 'numeric|required|max:9223372036854775807',
            'description' => 'string|required|max:200',
            'ad_referendum' => 'boolean|required',
            'plurianualidad' => 'boolean|required',
            'multi_year_year' => 'array|nullable',
            'multi_year_amount' => 'array|nullable',
            'system_awarded_by' => 'string|required|in:LOTE,ÍTEM,TOTAL,COMBINADO',
            // 'expenditure_object' => 'numeric|required|max:32767',
            'fonacide' => 'boolean|required',
            'catalogs_technical_annexes' => 'boolean|required',
            'alternative_offers' => 'boolean|required',
            'open_contract' => 'boolean|required',
            'period_time' => 'string|required|max:50',
            'manufacturer_authorization' => 'boolean|required',
            'financial_advance_percentage_amount' => 'boolean|nullable',
            'technical_specifications' => 'string|required|max:100',
            'samples' => 'boolean|required',
            'delivery_plan' => 'string|nullable|max:150',
            'evaluation_committee_proposal' => 'string|nullable|max:200',
            'payment_conditions' => 'string|nullable',
            'contract_guarantee' => 'string|nullable',
            'product_guarantee' => 'string|nullable|max:200',
            'contract_administrator' => 'string|required|max:150',
            'contract_validity' => 'string|required|max:200',
            'additional_technical_documents' => 'string|nullable|max:200',
            'additional_qualified_documents' => 'string|nullable|max:200',
            'price_sheet' => 'string|nullable|max:150',
            'property_title' => 'string|nullable|max:200',
            'magnetic_medium' => 'string|nullable|max:50',
            'referring_person_data' => 'string|nullable|max:100',

            // 'expenditure_object2' => 'numeric|required|max:32767',

            'form4_city' => 'string|max:100|nullable',
            'form4_date' => 'date_format:d/m/Y|nullable',
            'dncp_resolution_number' => 'string|max:8|nullable',
            'dncp_resolution_date' => 'date_format:d/m/Y|nullable',

            'total_amount' => 'string|required|max:9223372036854775807',

            'expenditure_object_id' => 'numeric|required|max:32767',
            'amount1' => 'string|required|max:9223372036854775807',

            'expenditure_object2_id' => 'numeric|nullable|max:32767',
            'amount2' => 'string|nullable|max:9223372036854775807',

            'expenditure_object3' => 'numeric|nullable|max:32767',
            'amount3' => 'string|nullable|max:9223372036854775807',

            'expenditure_object4' => 'numeric|nullable|max:32767',
            'amount4' => 'string|nullable|max:9223372036854775807',

            'expenditure_object5' => 'numeric|nullable|max:32767',
            'amount5' => 'string|nullable|max:9223372036854775807',

            'expenditure_object6' => 'numeric|nullable|max:32767',
            'amount6' => 'string|nullable|max:9223372036854775807',

            'total_amount' => 'string|required|max:9223372036854775807',

            'covid' => 'boolean|required',
        );
