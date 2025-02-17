@props(['sessionName' => 'success' ])


<div id="flash-message" class="bg-green-500 text-white p-4 rounded-lg mb-4">
    {{ session($sessionName) }}
</div>

<script>
    setTimeout(() => {
        let flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.transition = "opacity 0.5s ease";
            flashMessage.style.opacity = "0";
            setTimeout(() => flashMessage.remove(), 500);
        }
    }, 1000);
</script>