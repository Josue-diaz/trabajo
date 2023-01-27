class ListaTareas{

    constructor(){
        this.tareas = JSON.parse(localStorage.getItem('tareas'));
        if(!this.tareas){
            this.tareas  = [
                {tarea: 'Entregar reporte', completado: false},
                {tarea: 'Jugar pc', completado: false},
                {tarea: 'ir al cine', completado: true}
            ];
        }
        this.caragarTareas();
    }

    caragarTareas(){
        localStorage.setItem('tareas', JSON.stringify(this.tareas));
        let htmlTareas = this.tareas.reduce((html, tarea, indice) => html += this.generarHtmlTarea(tarea, indice, ''));
        document.getElementById('listaTareas').innerHTML = htmlTareas;
    }

    generarHtmlTarea(tarea, indice) {
        return `
            <li class="list-group-item checkbox>
                <div class="container">
                    <div class="row">
                        <div class="col-md-1 col-xs-1 col-lg-1 col-sm-1 checkbox">
                            <label>
                                <input id="cambiarEstadoTarea" type="checkbox" onchange="listaTareas.cambiarEstadoTarea(${indice})" value="" class="caja-comprobacion" ${tarea.completado ? 'checked': ''}>
                            </label>
                        </div>
                        <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10 texto-tarea ${tarea.completado ? 'tarea-completada' : ''}">
                            ${tarea.tarea}
                        </div>
                        <div class="col-md-1 col-xs-1 col-lg-1 col-sm-1 area-icono-eliminacion">
                            <a class="" href="/" onclick="listaTareas.eliminarTarea(event, ${indice})">
                                <i id="eliminarTarea" data-id=${indice} class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        `;
    }
    

}

let listaTareas;

window.addEventListener('load', () =>{
    listaTareas = new ListaTareas();
})