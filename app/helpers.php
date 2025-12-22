<?php

use App\Models\Setting;
use App\Services\SeoService;

if (!function_exists('setting')) {
    /**
     * Obtener el valor de una configuración desde la base de datos
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('seo')) {
    /**
     * Obtener datos SEO para una ruta específica
     *
     * @param string|null $routeName
     * @param string|null $title
     * @param string|null $description
     * @param string|null $keywords
     * @param string|null $image
     * @return object
     */
    function seo(?string $routeName = null, ?string $title = null, ?string $description = null, ?string $keywords = null, ?string $image = null): object
    {
        $seoService = app(SeoService::class);

        return $seoService->getMetaData($routeName, $title, $description, $keywords, $image);
    }
}

if (!function_exists('getOrganizationSchema')) {
    /**
     * Obtener el esquema de organización
     *
     * @return array
     */
    function getOrganizationSchema(): array
    {
        return app(SeoService::class)->getOrganizationSchema();
    }
}
