<?php
// ============================================================
// PROJECTS DATA — Edit your project info here
// ============================================================

function getAllProjects(): array {
    return [
        [
            'id'          => 1,
            'slug'        => 'loan-approval-prediction',
            'title'       => 'Loan Approval Prediction',
            'badge'       => 'ML PROJECT',
            'tech'        => ['Python', 'SQL', 'Power BI', 'Machine Learning'],
            'description' => 'Built an end-to-end machine learning model to predict loan approval based on customer details including income, credit history, employment status, and demographics. Includes data cleaning, EDA, model training, evaluation, SQL integration, and Power BI dashboard.',
            'icon'        => 'fa-brain',
            'color'       => 'blue',
            'github_url'  => '',
            'live_url'    => '',
            'case_study_url' => '',
            'workflow'    => ['DATA', 'CLEANING', 'EDA', 'MODEL', 'PREDICTION', 'SQL', 'POWER BI'],
            'features'    => ['Data Cleaning & Preprocessing', 'Exploratory Data Analysis', 'ML Model Training', 'Model Evaluation & Metrics', 'SQL Database Integration', 'Power BI Dashboard'],
        ],
        [
            'id'          => 2,
            'slug'        => 'ecommerce-sales-dashboard',
            'title'       => 'E-Commerce Sales & Super Store Dashboard',
            'badge'       => 'DATA ANALYTICS',
            'tech'        => ['Power BI', 'Data Analytics', 'Visualization'],
            'description' => 'Created interactive Power BI dashboards with KPIs, slicers, and charts for comprehensive sales, profit, and customer analysis. Features dynamic filters, trend analysis, and executive-level reporting for a super store dataset.',
            'icon'        => 'fa-chart-bar',
            'color'       => 'violet',
            'github_url'  => '',
            'live_url'    => '',
            'case_study_url' => '',
            'workflow'    => ['KPI', 'SALES', 'PROFIT', 'CUSTOMERS', 'FILTERS', 'VISUALIZATION'],
            'features'    => ['Interactive KPI Cards', 'Sales & Profit Analysis', 'Customer Segmentation', 'Dynamic Slicers & Filters', 'Trend Visualization', 'Executive Dashboard'],
        ],
        [
            'id'          => 3,
            'slug'        => 'ai-calling-agent',
            'title'       => 'AI Calling Agent',
            'badge'       => 'AI AUTOMATION',
            'tech'        => ['n8n', 'API', 'Automation', 'AI Workflows'],
            'description' => 'Developed an AI-based calling automation system using n8n. The system automates lead outreach with intelligent call routing, automated responses, outcome logging, and follow-up scheduling through API integrations.',
            'icon'        => 'fa-phone-volume',
            'color'       => 'cyan',
            'github_url'  => '',
            'live_url'    => '',
            'case_study_url' => '',
            'workflow'    => ['LEAD', 'TRIGGER', 'n8n', 'AI', 'CALLING API', 'OUTCOME', 'DATA LOG', 'FOLLOW-UP'],
            'features'    => ['Automated Call Initiation', 'Lead Handling & Routing', 'Workflow Automation via n8n', 'API Integration', 'Data Logging & Storage', 'Follow-up Automation'],
        ],
        [
            'id'          => 4,
            'slug'        => 'greentrans',
            'title'       => 'GreenTrans',
            'badge'       => 'AI CONCEPT',
            'tech'        => ['Python', 'Prompt Engineering', 'AI Concepts'],
            'description' => 'Developed an AI-based platform concept using prompt engineering to support smart transportation and eco-friendly sustainability solutions. Focuses on route optimization, emission tracking, and environmental awareness. (Concept/Project)',
            'icon'        => 'fa-leaf',
            'color'       => 'green',
            'github_url'  => '',
            'live_url'    => '',
            'case_study_url' => '',
            'workflow'    => ['INPUT', 'PROMPT ENGINE', 'AI MODEL', 'ROUTE OPT.', 'EMISSIONS', 'OUTPUT'],
            'features'    => ['Route Optimization Concepts', 'Emission Tracking Design', 'Smart Transportation Logic', 'Environmental Awareness', 'Prompt Engineering Techniques'],
        ],
        [
            'id'          => 5,
            'slug'        => 'ambulance-management-system',
            'title'       => 'Ambulance Management System',
            'badge'       => 'ACADEMIC PROJECT',
            'tech'        => ['PHP', 'MySQL', 'Web Development', 'Bootstrap'],
            'description' => 'Developed a full-stack web system to manage ambulance requests and availability. Features real-time request tracking, ambulance allocation, availability management, and emergency handling. Academic project demonstrating PHP and MySQL skills.',
            'icon'        => 'fa-ambulance',
            'color'       => 'red',
            'github_url'  => '',
            'live_url'    => '',
            'case_study_url' => '',
            'workflow'    => ['PATIENT', 'REQUEST', 'VALIDATION', 'AVAILABILITY', 'ALLOCATION', 'TRACKING', 'RESPONSE'],
            'features'    => ['Ambulance Request System', 'Real-time Availability Management', 'Quick Ambulance Allocation', 'Real-time Tracking Concept', 'Emergency Handling Module', 'Admin Dashboard'],
        ],
    ];
}

function getProjectBySlug(string $slug): ?array {
    foreach (getAllProjects() as $p) {
        if ($p['slug'] === $slug) return $p;
    }
    return null;
}
