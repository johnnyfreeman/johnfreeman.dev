<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommandsTest extends TestCase
{
    public function testHome()
    {
        $this->get('/')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'intro')
            ->assertStatus(200);

        $this->ajaxGet('/')
            ->assertViewIs('output.intro')
            ->assertViewHas('input', 'intro')
            ->assertStatus(200);
    }

    public function testAbout()
    {
        $this->get('about')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'about')
            ->assertStatus(200);

        $this->ajaxGet('about')
            ->assertViewIs('output.about')
            ->assertViewHas('input', 'about')
            ->assertStatus(200);
    }

    public function testBlog()
    {
        $this->get('blog')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'blog')
            ->assertStatus(200);

        $this->ajaxGet('blog')
            ->assertViewIs('output.blog')
            ->assertViewHas('input', 'blog')
            ->assertStatus(200);
    }

    public function testBuiltWith()
    {
        $this->get('built-with')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'built-with')
            ->assertStatus(200);

        $this->ajaxGet('built-with')
            ->assertViewIs('output.built-with')
            ->assertViewHas('input', 'built-with')
            ->assertStatus(200);
    }

    public function testFeatures()
    {
        $this->get('features')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'features')
            ->assertStatus(200);

        $this->ajaxGet('features')
            ->assertViewIs('output.features')
            ->assertViewHas('input', 'features')
            ->assertStatus(200);
    }

    public function testHelp()
    {
        $this->get('help')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'help')
            ->assertStatus(200);

        $this->ajaxGet('help')
            ->assertViewIs('output.help')
            ->assertViewHas('input', 'help')
            ->assertStatus(200);
    }

    public function testIntro()
    {
        $this->get('intro')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'intro')
            ->assertStatus(200);

        $this->ajaxGet('intro')
            ->assertViewIs('output.intro')
            ->assertViewHas('input', 'intro')
            ->assertStatus(200);
    }

    public function testMenu()
    {
        $this->get('menu')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'menu')
            ->assertStatus(200);

        $this->ajaxGet('menu')
            ->assertViewIs('output.menu')
            ->assertViewHas('input', 'menu')
            ->assertStatus(200);
    }

    public function testOpenSource()
    {
        $this->get('open-source')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'open-source')
            ->assertStatus(200);

        $this->ajaxGet('open-source')
            ->assertViewIs('output.open-source')
            ->assertViewHas('input', 'open-source')
            ->assertStatus(200);
    }

    public function testSocial()
    {
        $this->get('social')
            ->assertViewIs('terminal')
            ->assertViewHas('input', 'social')
            ->assertStatus(200);

        $this->ajaxGet('social')
            ->assertViewIs('output.social')
            ->assertViewHas('input', 'social')
            ->assertStatus(200);
    }
}
