<?php

namespace App\Services;

use App\Models\Setting;

class SeoService
{
    protected array $defaults = [
        'home' => [
            'title' => '{siteName} - Energía Solar y Almacenamiento Inteligente',
            'description' => 'Energía solar y almacenamiento inteligente para que tu empresa nunca se detenga. Reducimos tus costos energéticos y aumentamos la resiliencia de tu operación.',
        ],
        'about' => [
            'title' => 'Sobre Nosotros - {siteName}',
            'description' => 'Conoce más sobre {siteName} y cómo transformamos la manera en que tu empresa consume, produce y almacena electricidad.',
            'keywords' => 'sobre nosotros, empresa energía solar',
        ],
        'contact' => [
            'title' => 'Contáctanos - {siteName}',
            'description' => 'Ponte en contacto con nosotros para cualquier pregunta o consulta sobre nuestras soluciones de energía renovable.',
            'keywords' => 'contacto, consulta energía solar',
        ],
        'projects' => [
            'title' => 'Proyectos - {siteName}',
            'description' => 'Descubre nuestros proyectos de energía solar y almacenamiento inteligente. Soluciones personalizadas para empresas.',
            'keywords' => 'proyectos energía solar, casos de éxito',
        ],
        'faqs' => [
            'title' => 'Preguntas Frecuentes - {siteName}',
            'description' => 'Encuentra respuestas a las preguntas más frecuentes sobre energía solar, paneles solares y almacenamiento de energía.',
            'keywords' => 'preguntas frecuentes, FAQ, energía solar',
        ],
        'privacy-policy' => [
            'title' => 'Política de Privacidad - {siteName}',
            'description' => 'Política de privacidad de {siteName}. Conoce cómo protegemos y manejamos tu información personal.',
            'keywords' => 'política de privacidad, privacidad',
        ],
        'terms-of-service' => [
            'title' => 'Términos de Servicio - {siteName}',
            'description' => 'Términos y condiciones de servicio de {siteName}. Lee nuestros términos antes de usar nuestros servicios.',
            'keywords' => 'términos de servicio, términos y condiciones',
        ],
        'blog' => [
            'title' => 'Blog - {siteName}',
            'description' => 'Artículos y noticias sobre energía solar, almacenamiento de energía y energía renovable.',
            'keywords' => 'blog energía solar, noticias energía renovable',
        ],
    ];

    protected function getSiteData(): array
    {
        static $cached = null;

        if ($cached === null) {
            $appName = config('app.name', 'OroSolar');
            $cached = [
                'name' => setting('site_name', $appName),
                'description' => setting('site_description', 'Energía solar y almacenamiento inteligente para que tu empresa nunca se detenga'),
                'keywords' => setting('site_keywords', 'energía solar, paneles solares, almacenamiento de energía, energía renovable, energía limpia, energía sostenible'),
                'image' => setting('site_image', asset('images/slider-home.png')),
                'url' => config('app.url', url('/')),
            ];
        }

        return $cached;
    }

    /**
     * Obtener los datos SEO para una ruta específica
     *
     * @param string|null $routeName
     * @param string|null $title
     * @param string|null $description
     * @param string|null $keywords
     * @param string|null $image
     * @return object
     */
    public function getMetaData(?string $routeName = null, ?string $title = null, ?string $description = null, ?string $keywords = null, ?string $image = null): object
    {
        $routeName = $routeName ?? (request()->route()?->getName() ?? 'home');
        $site = $this->getSiteData();

        $default = $this->defaults[$routeName] ?? [];

        $finalTitle = $title
            ?? str_replace('{siteName}', $site['name'], $default['title'] ?? $site['name']);

        $finalDescription = $description
            ?? str_replace('{siteName}', $site['name'], $default['description'] ?? $site['description']);

        $finalKeywords = $keywords
            ?? ($default['keywords'] ?? '') . ', ' . $site['keywords'];

        $finalImage = $image ?? $site['image'];

        if ($finalImage && !filter_var($finalImage, FILTER_VALIDATE_URL)) {
            $finalImage = asset($finalImage);
        }

        return (object) [
            'title' => $finalTitle,
            'description' => $finalDescription,
            'keywords' => trim($finalKeywords, ', '),
            'image' => $finalImage,
            'siteName' => $site['name'],
            'url' => $site['url'],
            'currentUrl' => url()->current(),
            'locale' => str_replace('_', '-', app()->getLocale()),
        ];
    }

    public function getOrganizationSchema(): array
    {
        $site = $this->getSiteData();
        $socialLinks = array_filter([
            setting('facebook_url'),
            setting('twitter_url'),
            setting('instagram_url'),
            setting('linkedin_url'),
        ]);

        $logoUrl = asset('logo/default.svg');
        if (!filter_var($logoUrl, FILTER_VALIDATE_URL)) {
            $logoUrl = url($logoUrl);
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $site['name'],
            'url' => $site['url'],
            'logo' => $logoUrl,
            'description' => $site['description'],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => setting('phone', '+56939450537'),
                'contactType' => 'customer service',
                'email' => setting('email', 'info@orosolar.com'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Carmen Covarrubia 32 OF 510',
                    'addressLocality' => 'Santiago',
                    'addressRegion' => 'RM',
                    'addressCountry' => 'CL',
                ],
            ],
        ];

        if (!empty($socialLinks)) {
            $schema['sameAs'] = array_values($socialLinks);
        }

        return $schema;
    }

    public function getWebsiteSchema(): array
    {
        $site = $this->getSiteData();

        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $site['name'],
            'url' => $site['url'],
            'description' => $site['description'],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => $site['url'] . '/search?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ];
    }

    public function getContactPageSchema(string $title, string $description, string $url): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'name' => $title,
            'description' => $description,
            'url' => $url,
        ];
    }
}

