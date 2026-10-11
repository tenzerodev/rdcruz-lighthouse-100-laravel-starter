<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    public function test_every_page_has_its_title_description_canonical_and_share_card(): void
    {
        foreach (['/' => 'Every page scores', '/about' => 'How it scores 100', '/privacy' => 'Privacy'] as $url => $heading) {
            $this->get($url)->assertOk()
                ->assertSee($heading)
                ->assertSee('<meta name="description"', false)
                ->assertSee('<link rel="canonical" href="'.url($url === '/' ? '' : $url).'">', false)
                ->assertSee('<meta property="og:image"', false)
                ->assertSee('<link rel="manifest" href="/manifest.webmanifest">', false);
        }
    }

    public function test_pages_send_security_headers(): void
    {
        $this->get('/')
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    }

    public function test_the_current_page_is_marked_in_the_menu(): void
    {
        $this->get('/about')->assertSee('/about" aria-current="page"', false)->assertDontSee('/privacy" aria-current', false);
    }

    public function test_sitemap_and_robots(): void
    {
        $this->get('/sitemap.xml')->assertOk()->assertHeader('Content-Type', 'application/xml')->assertSee('<loc>'.route('about').'</loc>', false);
        $this->get('/robots.txt')->assertOk()->assertSee('Sitemap: '.route('sitemap'));
    }

    public function test_service_worker_precaches_the_offline_page_and_versioned_assets(): void
    {
        $sw = $this->get('/sw.js')->assertOk()->assertHeader('Service-Worker-Allowed', '/');
        $this->assertStringContainsString('"\/offline"', $sw->getContent());
        $this->assertMatchesRegularExpression('#/assets\\\\/css\\\\/site\.css\?v=\d+#', $sw->getContent());
        $this->get('/offline')->assertOk()->assertSee('noindex', false);
    }

    public function test_missing_pages_get_a_friendly_404(): void
    {
        $this->get('/nope')->assertNotFound()->assertSee('Page not found')->assertSee('noindex', false);
    }
}
