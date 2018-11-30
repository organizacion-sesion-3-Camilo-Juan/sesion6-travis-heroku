{ "collection" :
    {
        "title" : "Serie Database",
            "type" : "serie",
            "version" : "1.0",
            "href" : "{{ path_for('series')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/Movie","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('series') }}","prompt":"Series Television"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('series') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la Serie"},
                            {"name" : "descripcion", "value" : "{{ item.descripcion }}", "prompt" : "Descripción de la serie"},
                            {"name" : "temporadas", "value" : "{{ item.temporadas }}", "prompt" : "Temporadas"},
                            {"name" : "categoria", "value" : "{{ item.categoria }}", "prompt" : "Categoría"},
                            {"name" : "cadena", "value" : "{{ item.cadena }}", "prompt" : "Cadena de televisión"}
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre de la Serie"},
                {"name" : "descripcion", "value" : "", "prompt" : "Descripción de la Serie"},
                {"name" : "temporadas", "value" : "", "prompt" : "Temporadas"},
                {"name" : "categoria", "value" : "", "prompt" : "Categoría"},
                {"name" : "cadena", "value" : "", "prompt" : "Cadena de televisión"}        
            ]
                }
    } 
}




