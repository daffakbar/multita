@extends('walikelass.layout.auth')

@section('content')

<div class="page-content-wrapper-inner">
  <div class="content-viewport">
      <div class="row">
          <div class="col-lg-12">
              <div class="grid">
                <p class="grid-header"> Laporan pelanggaran perkelas</p>
                  <div class="item-wrapper">
                      <div class="table-responsive">
                        <div>
                          <button id="download-pdf" class="btn btn-danger">Download PDF</button>
                        </div>
                        <br>
                        <div id="example-table"class=""></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection

@section('footer')

<script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.7.0/dist/js/tabulator.min.js"></script>

<script>
var minMaxFilterEditor = function(cell, onRendered, success, cancel, editorParams){

var end;

var container = document.createElement("span");

//create and style inputs
var start = document.createElement("input");
start.setAttribute("type", "number");
start.setAttribute("placeholder", "Min");
start.setAttribute("min", 0);
start.setAttribute("max", 100);
start.style.padding = "4px";
start.style.width = "50%";
start.style.boxSizing = "border-box";

start.value = cell.getValue();

function buildValues(){
    success({
        start:start.value,
        end:end.value,
    });
}

function keypress(e){
    if(e.keyCode == 13){
        buildValues();
    }

    if(e.keyCode == 27){
        cancel();
    }
}

end = start.cloneNode();
end.setAttribute("placeholder", "Max");

start.addEventListener("change", buildValues);
start.addEventListener("blur", buildValues);
start.addEventListener("keydown", keypress);

end.addEventListener("change", buildValues);
end.addEventListener("blur", buildValues);
end.addEventListener("keydown", keypress);


container.appendChild(start);
container.appendChild(end);

return container;
}
//custom max min filter function
function minMaxFilterFunction(headerValue, rowValue, rowData, filterParams){


    if(rowValue){
        if(headerValue.start != ""){
            if(headerValue.end != ""){
                return rowValue >= headerValue.start && rowValue <= headerValue.end;
            }else{
                return rowValue >= headerValue.start;
            }
        }else{
            if(headerValue.end != ""){
                return rowValue <= headerValue.end;
            }
        }
    }

return true; //must return a boolean, true if it passes the filter.
}
    //define some sample data
var tabledata = {!! json_encode($pilihkelas) !!};

    var table = new Tabulator("#example-table", {
        data:tabledata,
        layout:"fitColumns",
    height:"311px",
    columns:[
      //   {title:"No.", formatter:"rownum", width:30},
        {title:"Semester", field:"semester", width:150, headerFilter:"input"},
        {title:"Tahun", field:"tahun", width:150, headerFilter:"input"},
        {title:"Nama", field:"name", width:150, headerFilter:"input"},
        {title:"Kelas", field:"kelas", width:150, headerFilter:"input"},
        {title:"Jenis Pelanggaran", field:"jenisPelanggaran", width:150, headerFilter:"input"},
        {title:"Poin", field:"poin", width:150, sorter:"number", headerFilter:minMaxFilterEditor, headerFilterFunc:minMaxFilterFunction},       
        {title:"Tanggal", field:"tanggalPelanggaran", hozAlign:"center", sorter:"input",  headerFilter:"input"},     
    ],
});
//trigger download of data.pdf file
document.getElementById("download-pdf").addEventListener("click", function(){
    table.download("pdf", "data.pdf", {
        orientation:"landscape", //set page orientation to portrait
        title:"Laporan Pelanggaran Siswa SMA Trimurti Surabaya", //add title to report
      
    autoTable:{ //advanced table styling
        margin: {top: 60},    
    },
    });
});
</script>
@endsection