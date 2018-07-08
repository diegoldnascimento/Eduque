function randomize(){
    var letters = new Array('A', 'B', 'C', 'D', 'K', 'L', 'M', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    var random = "";

    for(var i = 0; i < 10; i++){
        random += letters[ Math.floor(Math.random() * (0, letters.length-1)) ];
    }

    return random;
}

$(function(){
    $('#randomizar').on('click', function(e){
        $('input[name="codigo"]').val( randomize() );
        e.preventDefault();
    });
});
