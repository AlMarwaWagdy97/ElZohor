<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scroll Animation</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        height: 200vh; /* Make the body height large enough to scroll */
    }

    .container {
        width: 100%;
        height: 150vh; /* Make the container tall enough to scroll */
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding-top: 100px; /* Space at the top for the image */
    }

    .image-container {
        width: 100px; /* Initial small size of the image */
        height: 100px; /* Initial small size of the image */
        /*overflow: hidden;*/
        position: relative;
    }

    .content {
        height: 2000px; /* Add content to create scrolling space */
    }

    .sticky-image {
        position: absolute;
        top: 50%; /* Start the image in the middle of the page */
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0; /* Initially hidden */
        transform-origin: center center;
        transition: transform 0.2s ease-out, opacity 0.2s ease-out;
    }

    .sticky-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(0); /* Start with the image being scaled to 0 */
        transition: transform 0.2s ease-out, opacity 0.2s ease-out;
    }

</style>
<body>

<div class="container">
    <div class="sticky-image">
        <img src="{{url('attachments/products/test2.png')}}" alt="Image">
    </div>
</div>

<div class="content">
    <!-- Add more content to create scrolling space -->
    <p>Scroll down the page...</p>
</div>

<script>
    window.addEventListener('scroll', function () {
        let scrollPosition = window.scrollY; // Get the current scroll position
        let image = document.querySelector('.sticky-image img');

        // Calculate the scale factor based on scroll position
        let scaleValue = Math.min(scrollPosition / 300, 1); // Limit the scale to 1 (full size)

        // Apply the scale to the image
        image.style.transform = `scale(${scaleValue})`;

        // Fade in the image when the user scrolls
        let opacityValue = Math.min(scrollPosition / 300, 1); // Fade in the image as it scales
        image.parentElement.style.opacity = opacityValue;
    });
</script>

</body>
</html>
