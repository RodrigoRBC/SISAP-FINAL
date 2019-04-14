<script type="text/javascript">    
        var url;
        function justificar(){
            var row = $('#dg').datagrid('getSelected');
                $('#observacion').datagrid('load',"<?php echo Router::url(array('action' => 'dgobservaciones'))?>/"+row['Historialreporte.id'])
                $('#historial').datagrid('load',"<?php echo Router::url(array('action' => 'dghistorial'))?>/"+row['Historialreporte.id'])
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', row['Fdesagregada.descripcion']);
                $('#fm').form('load',row); 
                url = "<?php echo Router::url(array('action' => 'justificareasy'))?>/"+row['Historialreporte.id']+"/"+row['Fdesecproject.secproject_id'];
            }
        }
        function nuevo(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','NUEVO <?php echo strtoupper($tabla);?>');
            $('#fm').form('clear');
            url = "<?php echo Router::url(array('action' => 'add'))?>";
        }
        function editar(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','EDITAR <?php echo strtoupper($tabla);?>');
                $('#fm').form('load',row); 
                url = "<?php echo Router::url(array('action' => 'edit'))?>/"+row['id'];
            }
        }
        function eliminar(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dg').datagrid('reload');
                url = "<?php echo Router::url(array('action' => 'delete'))?>/"+row['id'];
            }
        }
        function guardar(){
            $('#fm').form('submit',{
                url: url,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $.messager.show({
                            title: 'Información',
                            msg: result.Msg
                        });
                        $('#dlg').dialog('close');
                        $('#dg').datagrid('reload'); 
                    }
                }
            });
        }
        function destruir(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirmar','¿Realmente, desea eliminar este registro?',function(r){
                    if (r){
                        $.post('<?php echo $this->here; ?>/delete/'+row['id'],{id:row['id']},function(result){
                            if (result.Msg){
                                $.messager.show({
                                    title: 'Información',
                                    msg: result.Msg
                                });
                                $('#dg').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
</script>