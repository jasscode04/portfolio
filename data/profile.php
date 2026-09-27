<?php
// ============================================================
// PROFILE DATA — Edit your personal information here
// ============================================================

function getProfile(): array {
    return [
        'name'        => 'Jasprit Singh Sanu',
        'title'       => 'AI Automation & Agentic AI Enthusiast',
        'subtitle'    => 'Building practical automation, AI workflows, data applications and intelligent software systems.',
        'email'       => OWNER_EMAIL,
        'phone'       => OWNER_PHONE,
        'location'    => OWNER_LOCATION,
        'github'      => GITHUB_URL,
        'linkedin'    => LINKEDIN_URL,
        'portfolio'   => PORTFOLIO_URL,
        'college'     => 'CIMAGE Professional College, Patna',
        'university'  => 'Patliputra University',
        'degree'      => 'Bachelor of Computer Applications (BCA)',
        'edu_year'    => '2023 – 2026',
        'objective'   => 'Motivated BCA student with a strong passion for AI automation, agentic AI systems, and data analytics. Seeking opportunities to apply and expand skills in Python, machine learning, API integrations, Power BI, and workflow automation. Eager to contribute to innovative AI-driven projects while continuously learning and growing in the field of intelligent systems.',

        'skills' => [
            'Programming' => [
                ['name' => 'Python',      'icon' => 'fa-python',    'level' => 85],
                ['name' => 'C',           'icon' => 'fa-code',      'level' => 70],
                ['name' => 'HTML',        'icon' => 'fa-html5',     'level' => 90],
                ['name' => 'CSS',         'icon' => 'fa-css3-alt',  'level' => 85],
                ['name' => 'JavaScript',  'icon' => 'fa-js',        'level' => 75],
                ['name' => 'PHP',         'icon' => 'fa-php',       'level' => 75],
            ],
            'Data & Analytics' => [
                ['name' => 'SQL',         'icon' => 'fa-database',  'level' => 80],
                ['name' => 'MySQL',       'icon' => 'fa-database',  'level' => 80],
                ['name' => 'NumPy',       'icon' => 'fa-chart-line','level' => 78],
                ['name' => 'Pandas',      'icon' => 'fa-table',     'level' => 80],
                ['name' => 'Matplotlib',  'icon' => 'fa-chart-bar', 'level' => 75],
                ['name' => 'Plotly',      'icon' => 'fa-chart-pie', 'level' => 72],
                ['name' => 'Power BI',    'icon' => 'fa-bolt',      'level' => 78],
                ['name' => 'Excel',       'icon' => 'fa-file-excel','level' => 82],
            ],
            'Web Development' => [
                ['name' => 'Django',      'icon' => 'fa-layer-group','level' => 68],
                ['name' => 'REST API',    'icon' => 'fa-plug',      'level' => 75],
                ['name' => 'React',       'icon' => 'fa-react',     'level' => 65],
                ['name' => 'Node.js',     'icon' => 'fa-node-js',   'level' => 65],
                ['name' => 'Express',     'icon' => 'fa-server',    'level' => 62],
                ['name' => 'MongoDB',     'icon' => 'fa-leaf',      'level' => 60],
            ],
            'AI & Automation' => [
                ['name' => 'Agentic AI',       'icon' => 'fa-robot',      'level' => 75],
                ['name' => 'Prompt Engineering','icon' => 'fa-magic',     'level' => 80],
                ['name' => 'n8n',              'icon' => 'fa-network-wired','level' => 78],
                ['name' => 'Zapier',           'icon' => 'fa-bolt',       'level' => 72],
                ['name' => 'AI Workflows',     'icon' => 'fa-project-diagram','level' => 76],
                ['name' => 'API Integration',  'icon' => 'fa-plug',       'level' => 78],
            ],
            'Tools' => [
                ['name' => 'Git',             'icon' => 'fa-git-alt',    'level' => 78],
                ['name' => 'GitHub',          'icon' => 'fa-github',     'level' => 80],
                ['name' => 'VS Code',         'icon' => 'fa-code',       'level' => 90],
                ['name' => 'MS Office',       'icon' => 'fa-file-word',  'level' => 85],
                ['name' => 'Google Workspace','icon' => 'fa-google',     'level' => 85],
                ['name' => 'Outlook',         'icon' => 'fa-envelope',   'level' => 82],
            ],
        ],

        'interests' => [
            'AI Automation', 'Agentic AI', 'Python', 'Data Analytics',
            'Power BI', 'APIs', 'Web Development', 'Machine Learning',
        ],

        'languages' => [
            ['lang' => 'English',  'level' => 'Professional'],
            ['lang' => 'Hindi',    'level' => 'Native'],
            ['lang' => 'Punjabi',  'level' => 'Native'],
        ],

        'certificates' => [
            'Python Programming – Coursera / NPTEL',
            'Data Analytics with Power BI',
            'Machine Learning Fundamentals',
            'SQL for Data Science',
            'Prompt Engineering for AI',
        ],
    ];
}
