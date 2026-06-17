<?php
// FILE: database/seeders/DatabaseSeeder.php
// REPLACE entire file

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\AlumniUser;
use App\Models\CmsSetting;
use App\Models\Faq;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Super Admin ───────────────────────────────────────────────────────
        User::firstOrCreate(
            ['email' => 'admin@poba.com'],
            [
                'name'        => 'Super Admin',
                'gender'      => 'Male',
                'role'        => 'superadmin',   // Full access — no permissions array needed
                'permissions' => null,
                'password'    => Hash::make('password'),
            ]
        );

        // ── Sample Limited Admin (News + Gallery only) ────────────────────────
        User::firstOrCreate(
            ['email' => 'editor@poba.com'],
            [
                'name'        => 'News Editor',
                'gender'      => 'Male',
                'role'        => 'admin',
                'permissions' => ['news', 'gallery'],   // Only these two sections
                'password'    => Hash::make('password'),
            ]
        );

        // ── Sample Limited Admin (Events only) ────────────────────────────────
        User::firstOrCreate(
            ['email' => 'eventmanager@poba.com'],
            [
                'name'        => 'Event Manager',
                'gender'      => 'Female',
                'role'        => 'admin',
                'permissions' => ['events'],
                'password'    => Hash::make('password'),
            ]
        );

        // ── Approved Alumni ───────────────────────────────────────────────────
        AlumniUser::firstOrCreate(
            ['email' => 'alumni@poba.com'],
            [
                'full_name'            => 'Muhammad Zakaullah',
                'password'             => Hash::make('password'),
                'entry'                => 5,
                'ccp_no'               => '228',
                'house'                => 'Jinnah',
                'education'            => 'Bachelors',
                'field_of_study'       => 'BBA',
                'field_of_work'        => 'Marketing',
                'current_city'         => 'Lahore',
                'current_country'      => 'Pakistan',
                'current_designation'  => 'HOD Marketing Department',
                'current_organization' => 'Adsells',
                'phone_number'         => '+92 345 450 1450',
                'class_year'           => '1975',
                'status'               => 'approved',
                'is_active'            => true,
                'consent_sharing'      => true,
                'agree_terms'          => true,
            ]
        );

        // ── CMS Default Settings ──────────────────────────────────────────────
        $defaults = [
            'hero_title'          => 'Welcome to POBA Alumni Network',
            'hero_tagline'        => 'Serving with Valour',
            'hero_description'    => 'Join our prestigious community of Pakistan Ocean & Bay Alumni. Stay connected, share experiences, and build lasting professional relationships.',
            'hero_btn_text'       => 'Become a Member',
            'about_title'         => 'About POBA',
            'about_description'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'about_btn_text'      => 'Become a Member',
            'mission_title'       => 'Our Mission',
            'mission_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'history_title'       => 'Our History',
            'history_description' => "Milestones in POBA's journey of excellence",
            'history_timeline'    => json_encode([
                ['year' => '1947', 'heading' => 'Foundation Era',        'description' => 'Establishment of Pakistan Navy and the beginning of naval education traditions.'],
                ['year' => '1965', 'heading' => 'First Alumni Network',  'description' => 'Formation of the first organized alumni association.'],
                ['year' => '1980', 'heading' => 'Formal Constitution',   'description' => 'POBA officially constituted with formal structure and governance framework.'],
                ['year' => '1995', 'heading' => 'Modernization Phase',   'description' => 'Introduction of modern communication systems and expanded alumni services.'],
                ['year' => '2010', 'heading' => 'Digital Transformation','description' => 'Launch of digital platforms for better alumni connectivity.'],
                ['year' => '2025', 'heading' => 'New Horizons',          'description' => 'Comprehensive website launch and enhanced alumni engagement initiatives.'],
            ]),
            'contact_email'    => 'info@poba.com',
            'contact_number'   => '+92 21 123 4567',
            'location'         => 'Cadet College Palandri, AJK',
            'bank_title'       => 'Bank of AJK',
            'account_title'    => 'Palandarians Old Boys Association',
            'account_number'   => '00001234657980',
            'branch_number'    => '063',
            'footer_copyright' => '© 2025 POBA. All rights reserved.',
            'seo_title'        => 'POBA - Pakistan Ocean & Bay Alumni | Official Alumni Network',
            'seo_keywords'     => 'POBA, Pakistan Ocean Bay Alumni, Pakistan Navy Alumni, Naval Officers Network',
            'seo_description'  => 'Official Pakistan Ocean & Bay Alumni (POBA) network. Est. 1947.',
        ];

        foreach ($defaults as $key => $value) {
            CmsSetting::firstOrCreate(['key' => $key], ['value' => $value]);
        }

        // ── Default FAQs ──────────────────────────────────────────────────────
        $faqs = [
            ['question' => 'What is POBA?',                'answer' => "POBA stands for Palandarians' Old Boys' Association — the official alumni network of Cadet College Palandri.", 'sort_order' => 1],
            ['question' => 'How do I become a member?',    'answer' => 'Click "Become a Member" and fill out the Alumni Registration Form. Admin will review and approve your application.', 'sort_order' => 2],
            ['question' => 'How long does approval take?', 'answer' => 'Applications are reviewed within 3–5 business days. You will receive an email once approved.', 'sort_order' => 3],
            ['question' => 'How do I register for events?','answer' => 'Browse the Events page and click "Register Now". You must be a logged-in approved member.', 'sort_order' => 4],
            ['question' => 'Is my information private?',   'answer' => 'You control your privacy settings during registration. You can hide your email, phone, or city from other alumni.', 'sort_order' => 5],
            ['question' => 'Can I update my profile?',     'answer' => 'Yes. Contact the admin team to update your profile information at any time.', 'sort_order' => 6],
        ];

        foreach ($faqs as $faq) {
            Faq::firstOrCreate(['question' => $faq['question']], $faq);
        }
    }
}
