<p align="center">
<a href="https://github.com/Bakumusal"><img title="Author" src="https://img.shields.io/badge/AUTHOR-BAKUMUSAL-red.svg?style=for-the-badge&logo=github"></a>
</p>
<p align="center">
<a href="https://trakteer.id/coffeeforme/tip"><img title="Author" src="https://img.shields.io/badge/COFFEE-FOR ME-red.svg?style=for-the-badge&logo="></a>
</p>

## How to connect to cloudflare (process.php)

```ts
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apiKey = 'YOUR_APIKEY'; // Apikey
    $apiEmail = 'YOUR_EMAIL'; // Email Cloudflare

    $listDomain = [
        'yourdomain.com' => 'ZONE_ID', // Zone ID
        'yourdomain.org' => 'ZONE_ID', // Zone ID
    ];
```

## Edit domain for main page (index.html)

```ts
            <label for="domain">Domain</label>
            <select id="domain" name="domain" required>
                <option value="" disabled selected>Select Domain</option>
                <option value="yourdomain.com">yourdomain.com</option>
                <option value="yourdomain.org">yourdomain.org</option>
            </select>
            // Add more domains if you need
```

## Add or delete Username and password (index.html)

```ts
        const credentials = [
            { username: 'admin', password: 'admin' },
            { username: 'admin2', password: 'admin2' },
            { username: 'admin3', password: 'admin3' },
            // Add more username and password pairs as needed
        ];
```