function loadConcept(concept) {
    fetch(`concepts/${concept}.html`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('content').innerHTML = data;
            var classElements = document.getElementsByClassName("list");
            for (var i = 0; i < classElements.length; i++) {
                classElements[i].style.fontWeight = "normal";
            }
            //document.getElementsByClassName("list").style.fontWeight = "normal";
            document.getElementById(concept).style.fontWeight = "bold";
            //codeassign() ;
        })
        .catch(error => {
            document.getElementById('content').innerHTML = `<p>Error loading concept: ${error}</p>`;
        });
}


function runCode() {
    var code = document.getElementById('code').value;
    var output = document.getElementById('output');
    output.textContent = ''; // Clear previous output
    
    // Use AJAX to send the PHP code to the server for execution
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'run.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            output.innerHTML = xhr.responseText;
        }
    };
    xhr.send('code=' + encodeURIComponent(code));
}