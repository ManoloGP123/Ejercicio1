function init() {
    $("#libros_Form").on("submit", (e) => {
      insertar(e);
    });
  }
  $().ready(() => {
    cargarTabla();
  });
  
  var cargarTabla = () => {
    var librosModelojs = new Clase_libro_js("", "todos");
    librosModelojs.todos();
  };
  
  var uno = (id) => {
    var librosModelojs = new Clase_libro_js("", "uno");
    librosModelojs.uno(id);
  };
  
  var insertar = (e) => {
    e.preventDefault();
    var libro_form = new FormData($("#libros_Form")[0]);
    var librosModelojs = new Clase_libro_js(libro_form, "insertar");
    librosModelojs.insertar();
  };
  init();
  