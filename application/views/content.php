<div id="login">
    <input class="ui-corner-all" placeholder="Usuario..." size="30" id="usuario"/><br>
    <input class="ui-corner-all" placeholder="Clave..." type="password" size="30" id="clave"/><br>
    <button id="conectar">Conectar</button>
</div>
<div id="contenido">
    <button id="cerrar_sesion">Cerrar Sesión</button>
            <div id="admin">
                <ul>
                    <li><a href="#tabs-1A">Productos</a></li>
                    <li><a href="#tabs-2A">Vendedores</a></li>
                    <li><a href="#tabs-3A">Otro</a></li>
                </ul>
                <div id="tabs-1A">
                    <table>
                        <tr>
                            <td>
                                <input id='codigo' placeholder="Código" type='text' size='10' maxlength="10"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id='nombre' placeholder="Nombre" type='text' size='10' maxlength="20"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id='marca' placeholder="Marca" type='text' size='10' maxlength="10"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select id='categorias' style='width: 150px;'></select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button id='btnGuardar'>Guardar</button>
                                <button id='actualizar'>Actualizar</button>
                            </td>
                        </tr>
                    </table>
                    <div id='reporte' style='display:none'>

                    </div>
                </div>
                <div id="tabs-2A">
                    <p>Todo lo referente a Vendedores</p>
                </div>
                <div id="tabs-3A">
                    <p>Otros</p>
                </div>
            </div>
            <div id="vendedor">
                <ul>
                    <li><a href="#tabs-1V">Ventas</a></li>
                    <li><a href="#tabs-2V">Reporte</a></li>
                    <li><a href="#tabs-3V">Mis Datos</a></li>
                </ul>
                <div id="tabs-1V">
                    <p>Listado de Ventas</p>
                </div>
                <div id="tabs-2V">
                    <p>Todos los reportes</p>
                </div>
                <div id="tabs-3V">
                    <p>Mis Datos Personales</p>
                </div>
            </div>
        <div id="nombreLogin"></div>
    </div>
    
</div>