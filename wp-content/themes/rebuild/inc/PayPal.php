<?php
/**
 * PayPal API
 */
class PayPal
{
    private string $host          = 'https://api-m.paypal.com';
    private string $invoices_url  = 'https://api-m.paypal.com/v2/invoicing/invoices';
    private string $token_url     = 'https://api-m.paypal.com/v1/oauth2/token';
    private string $client_id     = 'AXlb0bhSMkql_bWDa8B8doOcR-FV_eMC8SpCzU-DX_E0d21ttJnNFic1EpfVzNwqAHKebiC0dkv8xtBT';
    private string $client_secret = 'EHkOriWHXa_iRG7URvFWB4CQaaJYlvzLA7gPlPK8Kui5cT2rzsZuTpSKa5n_S2qO4-TmZTePZtCe6sKH';

    public function __construct() {
        if ( PAYPAL_SANDBOX )
            $this->activate_paypal_sandbox();
        $this->manage_actions();
    }

    public function manage_actions()
    {

    }

    /**
     * Get list invoices
     *
     * @return array $response_json
     */
    public function get_invoices_list()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL             => $this->invoices_url,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => "GET",
            CURLOPT_HTTPHEADER      => [
                'Content-Type: application/json',
                'Authorization: Bearer '. $this->get_access_token()
            ],
        ]);

        $response = curl_exec($curl);
        $response_json = json_decode($response, true);

        return $response_json;

        curl_close($curl);
    }

    public function get_invoice_single()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL             => 'https://api.sandbox.paypal.com/v2/invoicing/invoices/INV2-G4HN-XX8Y-6AZK-ARGD',
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => "GET",
            CURLOPT_HTTPHEADER      => [
                'Content-Type: application/json',
                'Authorization: Bearer '. $this->get_access_token()
            ],
        ]);

        $response = curl_exec($curl);
        $response_json = json_decode($response, true);

        return $response_json;

        curl_close($curl);
    }

    /**
     * Create new invoice DRAFT
     */
    public function create_invoice()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL             => $this->invoices_url,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => "POST",
            CURLOPT_HTTPHEADER      => [
                'Content-Type: application/json',
                'Authorization: Bearer '. $this->get_access_token()
            ],
            CURLOPT_POSTFIELDS => $this->set_invoice_postfields()
        ]);

        $response = curl_exec($curl);
        $response_json = json_decode($response, true);

        return $response_json;

        curl_close($curl);
    }

    /**
     * Sends or schedules an invoice, by ID, to be sent to a customer
     *
     * @param $invoice_id
     */
    public function send_invoice( $invoice_id )
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL             => "{$this->invoices_url}/{$invoice_id}/send",
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => "POST",
            CURLOPT_HTTPHEADER      => [
                'Content-Type: application/json',
                'Authorization: Bearer '. $this->get_access_token(),
                'PayPal-Request-Id: b1111'
            ],
            CURLOPT_POSTFIELDS => '{
              "send_to_invoicer": true             
            }'
        ]);

        $response = curl_exec($curl);
        $response_json = json_decode($response, true);

        return $response_json;

        curl_close($curl);
    }

    /**
     * Delete invoice
     *
     * @param string $invoice_id
     */
    public function delete_invoice( $invoice_id )
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL             => $this->invoices_url . '/' . $invoice_id,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => "DELETE",
            CURLOPT_HTTPHEADER      => [
                'Content-Type: application/json',
                'Authorization: Bearer '. $this->get_access_token()
            ]
        ]);

        $response = curl_exec($curl);
        $response_json = json_decode($response, true);

        return $response_json;

        curl_close($curl);
    }

    private function set_invoice_postfields()
    {
        $data = [
            "detail"=> [
                "invoice_number"=> $this->generate_invoice_number(),
                "reference"=> "deal-ref",
                "invoice_date"=> "2018-11-12",
                "currency_code"=> "USD",
                "note"=> "Thank you for your business.",
                "term"=> "No refunds after 30 days.",
                "memo"=> "This is a long contract",
                "payment_term"=> [
                    "term_type"=> "NET_10",
                    "due_date"=> "2018-11-22"
                ]
            ],
            "invoicer"=> [
                "name"=> [
                    "given_name"=> "David",
                    "surname"=> "Larusso"
                ],
                "address"=> [
                    "address_line_1"=> "1234 First Street",
                    "address_line_2"=> "337673 Hillside Court",
                    "admin_area_2"=> "Anytown",
                    "admin_area_1"=> "CA",
                    "postal_code"=> "98765",
                    "country_code"=> "US"
                ],
                "email_address"=> "merchant@example.com",
                "phones"=> [
                    [
                        "country_code"=> "001",
                        "national_number"=> "4085551234",
                        "phone_type"=> "MOBILE"
                    ]
                ],
                "website"=> "www.test.com",
                "tax_id"=> "ABcNkWSfb5ICTt73nD3QON1fnnpgNKBy- Jb5SeuGj185MNNw6g",
                "logo_url"=> "https=>//example.com/logo.PNG",
                "additional_notes"=> "2-4"
            ],
            "primary_recipients"=> [
                [
                    "billing_info"=> [
                        "name"=> [
                            "given_name"=> "Stephanie",
                            "surname"=> "Meyers"
                        ],
                        "address"=> [
                            "address_line_1"=> "1234 Main Street",
                            "admin_area_2"=> "Anytown",
                            "admin_area_1"=> "CA",
                            "postal_code"=> "98765",
                            "country_code"=> "US"
                        ],
                        "email_address"=> "bill-me@example.com",
                        "phones"=> [
                            [
                                "country_code"=> "001",
                                "national_number"=> "4884551234",
                                "phone_type"=> "HOME"
                            ]
                        ],
                        "additional_info_value"=> "add-info"
                    ],
                    "shipping_info"=> [
                        "name"=> [
                            "given_name"=> "Stephanie",
                            "surname"=> "Meyers"
                        ],
                        "address"=> [
                            "address_line_1"=> "1234 Main Street",
                            "admin_area_2"=> "Anytown",
                            "admin_area_1"=> "CA",
                            "postal_code"=> "98765",
                            "country_code"=> "US"
                        ]
                    ]
                ]
            ],
            "items"=> [
                [
                    "name"=> "Yoga Mat",
                    "description"=> "Elastic mat to practice yoga.",
                    "quantity"=> "1",
                    "unit_amount"=> [
                        "currency_code"=> "USD",
                        "value"=> "50.00"
                    ],
                    "tax"=> [
                        "name"=> "Sales Tax",
                        "percent"=> "7.25"
                    ],
                    "discount"=> [
                        "percent"=> "5"
                    ],
                    "unit_of_measure"=> "QUANTITY"
                ],
                [
                    "name"=> "Yoga t-shirt",
                    "quantity"=> "1",
                    "unit_amount"=> [
                        "currency_code"=> "USD",
                        "value"=> "10.00"
                    ],
                    "tax"=> [
                        "name"=> "Sales Tax",
                        "percent"=> "7.25"
                    ],
                    "discount"=> [
                        "amount"=> [
                            "currency_code"=> "USD",
                            "value"=> "5.00"
                        ]
                    ],
                    "unit_of_measure"=> "QUANTITY"
                ]
            ],
            "configuration"=> [
                "partial_payment"=> [
                    "allow_partial_payment"=> true,
                    "minimum_amount_due"=> [
                        "currency_code"=> "USD",
                        "value"=> "20.00"
                    ]
                ],
                "allow_tip"=> true,
                "tax_calculated_after_discount"=> true,
                "tax_inclusive"=> false
            ],
            "amount"=> [
                "breakdown"=> [
                    "custom"=> [
                        "label"=> "Packing Charges",
                        "amount"=> [
                            "currency_code"=> "USD",
                            "value"=> "10.00"
                        ]
                    ],
                    "shipping"=> [
                        "amount"=> [
                            "currency_code"=> "USD",
                            "value"=> "10.00"
                        ],
                        "tax"=> [
                            "name"=> "Sales Tax",
                            "percent"=> "7.25"
                        ]
                    ],
                    "discount"=> [
                        "invoice_discount"=> [
                            "percent"=> "5"
                        ]
                    ]
                ]
            ]
        ];
        $post_fields = json_encode($data, JSON_UNESCAPED_UNICODE);

        $post_fields = '{
  "detail": {
    "invoice_number": "'. $this->generate_invoice_number() .'",
    "reference": "deal-ref",
    "invoice_date": "2022-10-06",
    "currency_code": "USD",
    "note": "Thank you for your business.",
    "term": "No refunds after 30 days.",
    "memo": "This is a long contract",
    "payment_term": {
      "term_type": "NET_10",
      "due_date": "2022-10-06"
    }
  },
  "invoicer": {
    "name": {
      "given_name": "Rebuild Ukraine Together"
    },
    "address": {
      "address_line_1": "1234 First Street",
      "address_line_2": "337673 Hillside Court",
      "admin_area_2": "Anytown",
      "admin_area_1": "CA",
      "postal_code": "98765",
      "country_code": "US"
    },
    "email_address": "support@rometechcases.com",
    "phones": [
      {
        "country_code": "001",
        "national_number": "4085551234",
        "phone_type": "MOBILE"
      }
    ],
    "website": "'. get_site_url() .'",
    "logo_url": "'. get_template_directory_uri() .'/img/logo.svg",
    "additional_notes": "2-4"
  },
  "primary_recipients": [
    {
      "billing_info": {
        "name": {
          "given_name": "Stephanie",
          "surname": "Meyers"
        },
        "email_address": "rostik22988@gmail.com",
        "phones": [
          {
            "country_code": "001",
            "national_number": "4884551234",
            "phone_type": "HOME"
          }
        ],
        "additional_info_value": "add-info"
      }      
    }
  ],
  "items": [
    {
      "name": "Yoga Mat",
      "description": "Elastic mat to practice yoga.",
      "unit_amount": {
        "currency_code": "USD",
        "value": "1000.00"
      },
      "unit_of_measure": "AMOUNT"
    }
  ],
  "configuration": {
    "partial_payment": {
      "allow_partial_payment": true,
      "minimum_amount_due": {
        "currency_code": "USD",
        "value": "1.00"
      }
    },
    "allow_tip": true
  }  
}';

        return $post_fields;
    }

    private function generate_invoice_number()
    {
        $generate_num_url  = $this->host . '/v2/invoicing/generate-next-invoice-number';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL             => $generate_num_url,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => "POST",
            CURLOPT_HTTPHEADER      => [
                'Content-Type: application/json',
                'Authorization: Bearer '. $this->get_access_token()
            ]
        ]);

        $response_json = curl_exec($curl);
        $response_arr = json_decode($response_json, true);

        return $response_arr['invoice_number'];

        curl_close($curl);
    }

    /**
     * Fills the variables with sandbox data
     */
    private function activate_paypal_sandbox()
    {
        $this->host              = 'https://api-m.sandbox.paypal.com';
        $this->invoices_url      = 'https://api-m.sandbox.paypal.com/v2/invoicing/invoices';
        $this->token_url         = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';
        $this->client_id         = 'AVIeHve-UvRPgrCxG1hUeE81IYev8QDK1xP_AU3HLbvPtLM1AbHNej9PXDKoj7tFs23QhdSSWq7je4B3';
        $this->client_secret     = 'ECbTMiJJSD1eqRyu1DEGwqle3FO-6YSOykm3kkRUwR2wZNpB6tZuPS24NxTVziWpXgXT9AgxiqLREK-B';
    }

    /**
     * @return string $api_token
     */
    private function get_access_token()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->token_url,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_USERPWD => $this->client_id.':'.$this->client_secret,
            CURLOPT_POSTFIELDS => http_build_query([
                'grant_type' => 'client_credentials'
            ]),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded',
            ],
        ]);

        $response = curl_exec($curl);
        $response_json = json_decode($response, true);
        $api_token = $response_json['access_token'];

        return $api_token;

        curl_close($curl);
    }
}