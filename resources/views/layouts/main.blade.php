<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>{{ $titulo_pagina }}</title>
    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 25px;
}

.switch input { display:none; }

.slider {
  position: absolute;
  cursor: pointer;
  top: 0; left: 0; right: 0; bottom: 0;
  background-color: #ccc;
  transition: .4s;
  border-radius: 25px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: .4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #28a745;
}

input:checked + .slider:before {
  transform: translateX(24px);
}
</style>
</head>
<body style="background: url('{{  asset('img/simon.jpeg')}}') no-repeat center center fixed; background-size: cover;">
    @auth
    @include('components.navbar')
    @endauth

   <div class="pt-5 mt-4">
    @yield('contenido')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
document.querySelectorAll('.toggle-estado').forEach(toggle => {
    toggle.addEventListener('change', function() {
        let id = this.dataset.id;
        let estado = this.checked ? 1 : 0;

        fetch(`/usuarios/${id}/estado`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ activo: estado })
        })
        .then(res => res.json())
        .then(data => {
            console.log("Estado actualizado:", data.estado);
        });
    });
});
</script>
</body>
</html>