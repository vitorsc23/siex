<?php
    try {
        $ignorarSeguranca = true;
        
        require_once '../Utils/Init.php';
        
        $dados = R::find('acao');
        
        
        foreach($dados as $dado) {
            //Curso
            $curso = R::findOne('curso', 'id = ?', [$dado->curso_id]);
            unset($dado['curso_id']);
            $dado['curso'] = $curso;
            //Usuario
            $usuario = R::findOne('usuario', 'id = ?', [$dado->professor_id]);
            unset($dado['professor_id']);
            $dado['professor'] = $usuario;
            //Tipo Ação
            $tipo = R::findOne('tipo_acao', 'id = ?', [$dado->tipo_acao_id]);
            unset($dado['tipo_acao_id']);
            $dado['tipo_acao'] = $tipo;
            //Situação
            $situacao = R::findOne('situacao', 'id = ?', [$dado->situacao_id]);
            unset($dado['situacao_id']);
            $dado['situacao'] = $situacao;
            
        }
        
        respostaJson($dados);
    } catch(Exception $e) {
        respostaJsonErro($e->getMessage());
    }
?>