<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_page', function (Blueprint $table) {
            $table->string('features_title')->nullable()->after('feature_grid');
            $table->string('systems_eyebrow')->nullable()->after('systems_grid');
            $table->string('systems_title')->nullable()->after('systems_eyebrow');
            $table->text('systems_text')->nullable()->after('systems_title');
            $table->string('applications_eyebrow')->nullable()->after('systems_text');
            $table->string('applications_title')->nullable()->after('applications_eyebrow');
            $table->string('why_choose_eyebrow')->nullable()->after('why_choose_title');
            $table->string('news_eyebrow')->nullable()->after('why_choose_grid');
            $table->string('news_title')->nullable()->after('news_eyebrow');
            $table->string('news_cta_title')->nullable()->after('news_title');
            $table->text('news_cta_text')->nullable()->after('news_cta_title');
            $table->string('faq_eyebrow')->nullable()->after('news_cta_text');
            $table->string('faq_title')->nullable()->after('faq_eyebrow');
            $table->string('car_clubs_eyebrow')->nullable()->after('faq_title');
            $table->string('testimonials_eyebrow')->nullable()->after('contact_text');
            $table->string('testimonials_title')->nullable()->after('testimonials_eyebrow');
        });
    }

    public function down(): void
    {
        Schema::table('home_page', function (Blueprint $table) {
            $table->dropColumn([
                'features_title', 'systems_eyebrow', 'systems_title', 'systems_text',
                'applications_eyebrow', 'applications_title', 'why_choose_eyebrow',
                'news_eyebrow', 'news_title', 'news_cta_title', 'news_cta_text',
                'faq_eyebrow', 'faq_title', 'car_clubs_eyebrow',
                'testimonials_eyebrow', 'testimonials_title',
            ]);
        });
    }
};
