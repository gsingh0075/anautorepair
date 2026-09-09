<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

if (! function_exists('uses_project_document_root')) {
    /**
     * True when Apache's document root is the project folder, not public/.
     */
    function uses_project_document_root(): bool
    {
        $docRoot = realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: '';
        $public  = defined('FCPATH') ? (string) realpath(FCPATH) : '';

        return $docRoot !== '' && $public !== '' && $docRoot !== $public;
    }
}

if (! function_exists('asset_url')) {
    /**
     * URL for files that live in public/ (CSS, JS, images).
     * On shared hosting those files are served from /public/....
     * Docker already points at public/.
     */
    function asset_url(string $path = ''): string
    {
        $path   = ltrim($path, '/');
        $prefix = uses_project_document_root() ? 'public/' : '';

        return base_url($prefix . $path);
    }
}
