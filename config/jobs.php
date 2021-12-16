<?php

return [
    'questions' => [
        [
            'lang_key' => 'about_bindia',
            'q' => [
                [
                    'type' => 'TextArea',
                    'question' => 'How and what do you know about Bindia?',
                    'required' => true
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'Why do you want to work at Bindia?',
                ],
                [
                    'type' => 'Number',
                    'question' => 'How many hours do you wish to work per week (approx.)?',
                    'required' => true
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'How long are you intending to work at Bindia?',
                    'required' => true
                ],
                [
                    'type' => 'YesNo',
                    'question' => 'Do you have any connection to Indian culture?',
                    'required' => true
                ],
            ]
        ],
        [
            'lang_key' => 'about_you',
            'q' => [
                [
                    'type' => 'TextArea',
                    'question' => 'What are your future plans within the next 2 years?',
                    'required' => true
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'What is your dream job/profession?',
                    'required' => true
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'Where do you see yourself 5 years from now?',
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'Any other details you would like us to know?',
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'What are your holiday plans for the next 6 months?',
                    'required' => true
                ],
                [
                    'type' => 'URL',
                    'question' => 'Your video presentation link.',
                ],
                [
                    'type' => 'Text',
                    'question' => 'Skype ID',
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'Write a bit about yourself',
                ],
                [
                    'type' => 'Phone',
                    'question' => 'WhatsApp number.',
                    'required' => true
                ],

            ]
        ],
        [
            'lang_key' => 'education',
            'q' => [
                [
                    'type' => 'TextArea',
                    'question' => 'Academic education?',
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'Professional education?',
                ],
                [
                    'type' => 'YesNo',
                    'question' => 'Do you have a Danish hygiene certificate?',
                    'required' => true
                ],
            ]
        ],
        [
            'lang_key' => 'expectations',
            'q' => [
                [
                    'type' => 'TextArea',
                    'question' => 'Working in a restaurant is hard work and low wages. How do you feel about that?',
                ],
                [
                    'type' => 'Number',
                    'question' => 'What are your expectations for hourly wages?',
                    'required' => true
                ],
                [
                    'type' => 'YesNo',
                    'question' => 'Would you be open to work in the evenings and nearly every weekend?',
                ],
            ]
        ],
        [
            'lang_key' => 'experience_skills',
            'q' => [
                [
                    'type' => 'TextArea',
                    'question' => 'What are your 3 best skills?'
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'How handy are you? (Fixing smaller things.)'
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'Please describe your last 3 jobs'
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'Please list your past workplaces'
                ],
                [
                    'type' => 'YesNo',
                    'question' => 'Do you have a driver\'s license that is valid in Denmark?',
                    'required' => true
                ],
                [
                    'type' => 'YesNo',
                    'question' => 'Relevant experience?',
                    'required' => true
                ],
                [
                    'type' => 'YesNo',
                    'question' => 'Customer service experience?',
                    'required' => true
                ],
            ],
        ],
        [
            'lang_key' => 'language',
            'q' => [
                [
                    'type' => 'TextArea',
                    'question' => 'Which languages do you speak?',
                    'required' => true
                ],
                [
                    'type' => 'TextArea',
                    'question' => 'What is your mother tongue?',
                    'required' => true
                ],
                [
                    'type' => 'Radio',
                    'question' => 'Danish',
                    'options' => [
                        'Poor', 'Average', 'Good', 'Excellent'
                    ]
                ],
                [
                    'type' => 'Radio',
                    'question' => 'English',
                    'options' => [
                        'Poor', 'Average', 'Good', 'Excellent'
                    ]
                ],
                [
                    'type' => 'Radio',
                    'question' => 'Hindi/Urdu',
                    'options' => [
                        'Poor', 'Average', 'Good', 'Excellent'
                    ]
                ],
                [
                    'type' => 'Radio',
                    'question' => 'English',
                    'options' => [
                        'Poor', 'Average', 'Good', 'Excellent'
                    ]
                ],
            ]
        ],
        [
            'lang_key' => 'your_info',
            'q' => [
                [
                    'type' => 'CheckBox',
                    'question' => 'Gender?',
                    'required' => true,
                    'options' => [
                        'Male', 'Female',
                    ]
                ],
                [
                    'type' => 'Text',
                    'question' => 'Full Name',
                    'required' => true,
                ],
                [
                    'type' => 'Email',
                    'question' => 'Email',
                    'required' => true,
                ],
                [
                    'type' => 'Text',
                    'question' => 'Address',
                    'required' => true,
                ],
                [
                    'type' => 'Phone',
                    'question' => 'Phone',
                    'required' => true,
                ],
                [
                    'type' => 'Number',
                    'question' => 'Age *(Min.age required is 18 yrs)',
                    'required' => true,
                ],
                [
                    'type' => 'Text',
                    'question' => 'Nationality',
                    'required' => true,
                ],
                [
                    'type' => 'Text',
                    'question' => 'Your interests/hobbies'
                ],
                [
                    'type' => 'Text',
                    'question' => '1. Social media profile links'
                ],
                [
                    'type' => 'Text',
                    'question' => '2. Social media profile links'
                ],
                [
                    'type' => 'Photo',
                    'question' => 'Please upload your photo',
                    'required' => true,
                ],
            ]
        ],
        [
            'lang_key' => 'residency',
            'q' => [
                [
                    'type' => 'Text',
                    'question' => 'Why are you in Denmark?',
                    'required' => true
                ],
                [
                    'type' => 'Text',
                    'question' => 'How long have you been in Denmark?',
                    'required' => true
                ],
                [
                    'type' => 'YesNo',
                    'question' => 'Are you entitled to work in Denmark?',
                    'required' => true
                ],
                [
                    'type' => 'CheckBox',
                    'question' => 'When is your Danish work permit ending?',
                    'options' => [
                        'Never'
                    ]
                ],
                [
                    'type' => 'Date',
                    'question' => 'Work permit ending',
                    'options' => [
                        'Never'
                    ]
                ],
            ]
        ]
    ]
];
