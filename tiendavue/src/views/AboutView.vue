<template>
  <main>
        <!-- Sección "Nosotros" -->
        <section id="nosotros" class="container">
        <h2>Nuestra Historia</h2>
        <p>Somos una tienda de café apasionada por ofrecer café de la más alta calidad. Nuestros granos de café se cosechan en regiones selectas y se tuestan con cuidado para ofrecer un sabor excepcional.</p>
    </section>

    <!-- Sección de contacto -->
    <section id="contacto" class="container">
        <h2>Contacto</h2>
        <p>¿Tienes alguna pregunta o comentario? ¡Contáctanos!</p>
        <form>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </section>
  </main>
</template>

