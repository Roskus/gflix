<div class="embed-responsive embed-responsive-16by9 mt-2">
    <video id="video" controls preload="metadata" @isset($video->poster)poster="{{ asset("storage/$video->poster") }}"@endisset class="embed-responsive-item" autoplay>
        <source src="{{ asset('storage/'.$video->path.'/'.$video->src) }}" type="video/mp4">
        <track label="Español" kind="subtitles" srclang="es" src="{{ asset('storage/'.$video->path.'/'.$video->slug) }}.vtt" default>
        <track label="English" kind="subtitles" srclang="en" src="{{ asset('storage/'.$video->path.'/'.$video->slug) }}_en.vtt">
    </video>
</div>
@isset($nextChapterUrl)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var video = document.getElementById('video');
        var notified = false; // Para asegurarse de que la notificación solo se muestra una vez

        video.ontimeupdate = function() {
            var timeLeft = video.duration - video.currentTime;
            if (timeLeft <= 60 && !notified) {
                // Muestra la notificación de Bootstrap aquí
                showBootstrapNotification();
                notified = true; // Evita que la notificación se muestre más de una vez
                // Espera unos segundos antes de redirigir para que el usuario pueda ver la notificación
                setTimeout(function() {
                    window.location.href = '{{ $nextChapterUrl }}'; // Asegúrate de que $nextChapterUrl esté definida
                }, 4000); // Espera 4 segundos antes de redirigir
            }
        };
    });

    function showBootstrapNotification() {
        let notificationHtml = '<div class="alert alert-primary" role="alert" style="position: fixed; bottom: 20px; right: 20px;">Próximo capítulo en breve...</div>';
        document.body.innerHTML += notificationHtml;
        // Opcional: eliminar la notificación después de un tiempo
        setTimeout(function() {
            let alerts = document.querySelectorAll('.alert');
            let lastAlert = alerts[alerts.length - 1];
            if (lastAlert) lastAlert.remove();
        }, 4000); // Elimina la notificación después de 4 segundos
    }
</script>
@endisset
