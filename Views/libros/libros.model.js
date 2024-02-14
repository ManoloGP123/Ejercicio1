class Clase_libro_js {
    constructor(libro, ruta) {
      this.libro = libro;
      this.ruta = ruta;
    }
  
    todos() {
      var html = "";
      $.get(
        "../../Controllers/libros.controllers.php?op=" + this.ruta,
        (res) => {
          console.log(res);
          res = JSON.parse(res);
          $.each(res, (index, libro) => {
            html += `<tr>
              <td>${index + 1}</td>
              <td>${libro.titulo}</td>
              <td>${libro.autor}</td>
              <td>${libro.año_publicacion}</td>
              <td>${libro.leido ? 'Sí' : 'No'}</td>
              <td><button class='btn btn-success' onclick='uno(${libro.id})'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${libro.id})'>Eliminar</button> </td>
              </tr>`;
          });
          console.log(html);
          $("#tablalibros").html(html);
        }
      );
    }
  
    uno(id) {
      $.post(
        "../../Controllers/libros.controllers.php?op=" + this.ruta,
        { id: id },
        (book) => {
          console.log({ conPOO: book });
          // Aquí deberías llenar el formulario de edición con los datos del libro
        }
      );
    }
  
    insertar() {
      $.ajax({
        url: "../../Controllers/libros.controllers.php?op=" + this.ruta,
        type: "POST",
        data: this.libro,
        processData: false,
        contentType: false,
        cache: false,
        success: (res) => {
          res = JSON.parse(res);
          if (res) {
            alert("Libro guardado con éxito.");
            cargarTabla(); // Recarga la tabla después de insertar
          } else {
            alert("Error al guardar el libro.");
          }
        },
      });
    }

    // Método para eliminar un libro
    eliminar(id) {
      if(confirm("¿Estás seguro de querer eliminar este libro?")) {
        $.post(
          "../../Controllers/libros.controllers.php?op=eliminar",
          { id: id },
          (res) => {
            res = JSON.parse(res);
            if (res.success) {
              alert("Libro eliminado con éxito.");
              cargarTabla(); // Recarga la tabla después de eliminar
            } else {
              alert("Error al eliminar el libro.");
            }
          }
        );
      }
    }
}
