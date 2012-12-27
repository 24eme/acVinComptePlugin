function(doc) {
  	if (doc.type == "Compte") {
  		emit([doc.interpro, 
  			  doc._id, 
  			  doc.nom_a_afficher, 
		  	  doc.identifiant, 
		  	  doc.adresse, 
		  	  doc.commune, 
		      doc.code_postal], null);
 	}
}