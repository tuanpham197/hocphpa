
function func(a){
    var eId = a.getAttribute('eid');
    var eTitle = a.getAttribute('etitle');
    var ePrice = a.getAttribute('eprice');
    var eAuthor = a.getAttribute('eauthor');
    var eYear = String(a.getAttribute('eyear'));

    
    
    var id = document.getElementById("id");
    var title = document.getElementById("title");
    var price = document.getElementById("price");
    var author = document.getElementById("author");
    var year = document.getElementById("yeare");
    console.log(year);
    
  
    id.value = eId;
    title.value = eTitle;
    price.value = ePrice;
    author.value = eAuthor;
    year.value = eYear;

}

