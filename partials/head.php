<?php
  // Deteksi apakah ini halaman detail produk
  $is_product_page = isset($is_product_page) && $is_product_page === true;

  // Jika ada info produk, ambil datanya (opsional jika sudah diset dari luar)
  $product_name = $prod_tiktok['title'] ?? '';
  $product_price = $prod_tiktok["harga_new"] ?? '';
  $product_currency = $product_currency ?? 'IDR';
  $product_availability = $product_availability ?? 'https://schema.org/InStock';

  // Deteksi apakah ini halaman prompt
  $is_prompt_page = isset($is_prompt_page) && $is_prompt_page === true;
?>
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="manifest" href="/manifest.json" />
    <meta name="theme-color" content="#7ecca0" />
    <!-- iOS full screen support -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta name="apple-mobile-web-app-title" content="ZHStore." />
    <link rel="apple-touch-icon" href="/favicon-192.png" />
    <title><?php echo $ogtitle;?></title>
    <meta name="description" content="<?php echo $ogdesc;?>" />
    <!-- Open Graph (Facebook, WhatsApp, Telegram, LinkedIn, dll) -->
    <meta property="og:logo" content="https://store.zhwifi.web.id/assets/img/fav.png" />
    <meta property="og:title" content="<?php echo $ogtitle;?>" />
    <meta property="og:description" content="<?php echo $ogdesc;?>" />
<?php
  // Cek apakah $ogimg adalah URL absolut (sudah mengandung http atau https)
  $is_absolute = (strpos($ogimg, 'http') === 0);

  // Buat URL final
  $final_ogimg = $is_absolute ? $ogimg : 'https://store.zhwifi.web.id' . $ogimg;
?>
    <meta property="og:image" content="<?php echo htmlspecialchars($final_ogimg); ?>" />
    <meta property="og:url" content="<?php echo $ogurl;?>" />
    <meta property="og:site_name" content="ZHStore" />
    <meta property="og:type" content="<?php echo $ogtype;?>" />
    <meta property="og:locale" content="id_ID" />
<?php if ($is_product_page): ?>
    <meta property="product:price:amount" content="<?php echo $product_price; ?>" />
    <meta property="product:price:currency" content="<?php echo $product_currency; ?>" />
    <meta property="product:availability" content="<?php echo $product_availability; ?>" />
<?php endif; ?>


    <!-- Twitter Card (X) -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $ogtitle;?>" />
    <meta name="twitter:description" content="<?php echo $ogdesc;?>" />
    <meta name="twitter:image" content="<?php echo htmlspecialchars($final_ogimg); ?>" />
    <meta name="twitter:site" content="@zalsknndy19" />
    <meta name="twitter:creator" content="@zalsknndy19" />

    <!-- Tambahan untuk SEO -->
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo $ogurl;?>" />
    
    <!-- Google  Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet"/>
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/assets/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/slick-theme.css"/>
    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/assets/css/nouislider.min.css"/>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="/assets/img/fav.png" type="image/x-icon"/>
    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="/assets/css/styles.css"/>
<?php if ($is_prompt_page): ?>
    <link type="text/css" rel="stylesheet" href="/assets/css/styleprompt.css"/>
<?php endif; ?>
<?php if ($is_product_page): 
  $sku_id = str_pad($id, 4, '0', STR_PAD_LEFT);
?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "<?php echo htmlspecialchars($product_name) ?>",
      "image": ["<?php echo $ogimg ?>"],
      "description": "<?php echo htmlspecialchars(strip_tags($product_description)) ?>",
      "sku": "ZH-TIKTOK-<?php echo $sku_id ?>",
      "offers": {
        "@type": "Offer",
        "url": "<?php echo $ogurl ?>",
        "priceCurrency": "<?php echo $product_currency ?>",
        "price": <?php echo $product_price ?>,
        "priceValidUntil": "2030-12-31",
        "availability": "<?php echo $product_availability ?>",
        "itemCondition": "https://schema.org/NewCondition"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": <?php echo $rating ?>,
        "reviewCount": <?php echo $prod_tiktok["rating"] ?>
      }
    }
    </script>
<?php endif; ?>
  </head>
