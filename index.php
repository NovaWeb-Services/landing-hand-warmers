<?php
/**
 * NovaCommerce Landing Page
 *
 * This landing page fetches offer data from NovaCommerce API
 * and renders a fully functional sales funnel.
 */

// Load configuration
require_once __DIR__ . '/config.php';

// Cache file path
$cacheFile = __DIR__ . '/cache/offer_' . md5($offerSlug) . '.json';

/**
 * Fetch offer data from API with caching
 */
function fetchOfferData($apiUrl, $apiKey, $cacheFile, $cacheTtl, $cacheEnabled) {
    // Check cache
    if ($cacheEnabled && file_exists($cacheFile)) {
        $cacheAge = time() - filemtime($cacheFile);
        if ($cacheAge < $cacheTtl) {
            $cached = json_decode(file_get_contents($cacheFile), true);
            if ($cached) {
                return $cached;
            }
        }
    }

    // Fetch from API
    $ch = curl_init($apiUrl);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'X-Landing-Api-Key: ' . $apiKey,
            'Accept: application/json',
        ],
        CURLOPT_TIMEOUT => 10,
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        return null;
    }

    $data = json_decode($response, true);

    // Cache the response
    if ($cacheEnabled && $data) {
        @file_put_contents($cacheFile, $response);
    }

    return $data;
}

// Fetch offer data
$data = fetchOfferData($apiUrl, $apiKey, $cacheFile, $cacheTtl, $cacheEnabled);

if (!$data || !isset($data['offer'])) {
    http_response_code(503);
    echo '<h1>Service Temporarily Unavailable</h1>';
    echo '<p>Please try again later.</p>';
    if ($debug) {
        echo '<pre>API URL: ' . htmlspecialchars($apiUrl) . '</pre>';
    }
    exit;
}

$offer = $data['offer'];
$checkoutApiUrl = $data['checkout_api_url'];

// Helper function to safely output HTML
function e($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

// Helper function to highlight text
function highlightText($text, $highlight) {
    if (!$highlight || !$text) {
        return e($text);
    }
    return str_replace(
        e($highlight),
        '<span class="text-primary">' . e($highlight) . '</span>',
        e($text)
    );
}

// Include the layout template
include __DIR__ . '/templates/layout.php';
