<!DOCTYPE html>
<html>
<head>
    <title>Specific Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
<?= $this->include('templates/header') ?>
<?= $this->include('templates/footer') ?>


<div class="container mt-4">
    <h1><?= $product['product_name']; ?></h1>

    <div id="carousel<?= $product['id']; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        <?php
                        $images = explode(',', $product['product_images']);
                        $firstImage = true;
                        foreach ($images as $index => $image) {
                            $imageClass = $firstImage ? 'active' : '';
                            ?>
                            <div class="carousel-item <?= $imageClass; ?>">
                                <img src="<?= base_url('/' . $image); ?>" class="d-block w-800 h-800" alt="Product Image" style="height: 600px;">
                            </div>
                            <?php
                            $firstImage = false;
                        }
                        ?>

                    </div>
                    <a class="carousel-control-prev" href="#carousel<?= $product['id']; ?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel<?= $product['id']; ?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

        </div>



    <div class="row mt-4">
        <div class="col-md-6">
            <p class="card-text"><?= $product['product_description']; ?></p>
            <p class="card-text">Location: <?= $product['location']; ?></p>
            <p class="card-text">Bedrooms: <?= $product['bedrooms']; ?></p>
            <p class="card-text">Bathrooms: <?= $product['bathrooms']; ?></p>
        </div>
        <div class="col-md-6">
            <p class="card-text">Price: <?= $product['price']; ?></p>
            <p class="card-text">Available from: <?= $product['available_date']; ?></p>
            <p class="card-text">Additional Information: <?= $product['additional_info']; ?></p>
            <a href="#" class="btn btn-primary">Book now</a>
        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
