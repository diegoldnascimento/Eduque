function listarProfessor($curso_id){
    $.get('http://localhost:8080/eduque/curso/listarprofessor/5', function(data){
        console.log(data);
    };
}
