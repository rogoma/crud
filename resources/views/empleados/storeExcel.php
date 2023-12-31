<!-- storeExcel -->

$rules = array(
                    'responsible' => 'string|required|max:100',
                    'year' => 'numeric|required|max:9999|min:1',
                    'modality' => 'string|required|max:10',
                    'covid' => 'boolean|required|min:0|max:1',
                    'program_type' => 'numeric|required|max:999',
                    'program' => 'numeric|required|max:999',
                    'sub_program' => 'numeric|required|max:999',
                    'funding_source' => 'numeric|required|max:32767',
                    'financial_organism' => 'numeric|required|max:32767',
                    'description' => 'string|required|max:200',
                    'expenditure_object' => 'numeric|required|max:32767',
                    'amount1' => 'numeric|required|max:9223372036854775807',
                    // 'expenditure_object2' => 'numeric|nullable|max:32767',
                    'expenditure_object2' => 'numeric|max:32767',
                    'amount2' => 'numeric|nullable|max:9223372036854775807',
                    // 'expenditure_object3' => 'numeric|nullable|max:32767',
                    'expenditure_object3' => 'numeric|max:32767',
                    'amount3' => 'numeric|nullable|max:9223372036854775807',
                    // 'expenditure_object4' => 'numeric|nullable|max:32767',
                    'expenditure_object4' => 'numeric|max:32767',
                    'amount4' => 'numeric|nullable|max:9223372036854775807',
                    // 'expenditure_object5' => 'numeric|nullable|max:32767',
                    'expenditure_object5' => 'numeric|max:32767',
                    'amount5' => 'numeric|nullable|max:9223372036854775807',
                    // 'expenditure_object6' => 'numeric|nullable|max:32767',
                    'expenditure_object6' => 'numeric|max:32767',
                    'amount6' => 'numeric|nullable|max:9223372036854775807',

                    //total amount se valida más abajo
                    'total_amount' => 'numeric|required|max:9223372036854775807',

                    'ad_referendum' => 'boolean|required|min:0|max:1',
                    'plurianualidad' => 'boolean|required|min:0|max:1',
                    'system_awarded_by' => 'string|required|in:LOTE,ÍTEM,TOTAL,COMBINADO',
                    // 'expenditure_object' => 'numeric|required|max:32767',
                    'fonacide' => 'boolean|required|min:0|max:1',
                    'catalogs_technical_annexes' => 'boolean|required|min:0|max:1',
                    'alternative_offers' => 'boolean|required|min:0|max:1',
                    'open_contract' => 'numeric|required|min:1|max:3',
                    'period_time' => 'string|required|max:50',
                    'manufacturer_authorization' => 'boolean|required|min:0|max:1',
                    'technical_specifications' => 'string|required|max:100',
                    'samples' => 'boolean|required|min:0|max:1',
                    'delivery_plan' => 'string|nullable|max:150',
                    'contract_administrator' => 'string|required|max:150',
                    'contract_validity' => 'string|required|max:200',
                    'price_sheet' => 'string|nullable|max:150',

                    'dncp_pac_id' => 'numeric|nullable|max:2147483647',
                    'begin_date' => 'date_format:d/m/Y|nullable',
                    'financial_advance_percentage_amount' => 'boolean|nullable',
                    'evaluation_committee_proposal' => 'string|nullable|max:200',
                    'payment_conditions' => 'string|nullable',
                    'contract_guarantee' => 'string|nullable',
                    'product_guarantee' => 'string|nullable|max:200',
                    'additional_technical_documents' => 'string|nullable|max:200',
                    'additional_qualified_documents' => 'string|nullable|max:200',
                    'property_title' => 'string|nullable|max:200',
                    'magnetic_medium' => 'string|nullable|max:50',
                    'referring_person_data' => 'string|nullable|max:100',

                    'form4_city' => 'string|max:100|nullable',
                    'form4_date' => 'date_format:d/m/Y|nullable',
                    'dncp_resolution_number' => 'string|max:8|nullable',
                    'dncp_resolution_date' => 'date_format:d/m/Y|nullable',
                );
