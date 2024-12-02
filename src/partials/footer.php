<footer>
  <div class="container-fluid">
    <div class="row footer-direita footer-pad">
      <div>
        <p class="copy"><?php echo date('Y'); ?> © Copyright -
          <a href="https://www.odonto.ufmg.br" target="_blank">Faculdade de Odontologia da UFMG</a>
          <img src="../../public/image/sti (3).png" alt="Logo UFMG" class="img-footer">
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap5.min.js"></script>
<!-- Atualizado para Bootstrap 5 -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap5.min.js"></script>
<!-- Atualizado para Bootstrap 5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/no-data-to-display.js"></script>


<!-- Informacoes -->
<script>
  function Informacoes() {
    var selectedMaterial = $("#SeletorRetirada").val();
    if (!selectedMaterial) return;

    $('#loading-indicator').show();
    $.ajax({
      type: 'POST',
      url: '../models/funcao_informacoes.php',
      data: { material: selectedMaterial },
      success: function (data) {
        $('#Informacoes').val(data);
      },
      error: function (xhr, status, error) {
        alert("Erro: " + error);
      },
      complete: function () {
        $('#loading-indicator').hide();
      }
    });
  }

  $(document).ready(function () {
    $('#Informacoes').val('');

    $('#SeletorRetirada').change(Informacoes);
  });
</script>

<!-- Chamada de funções -->
<script>
  function Dados() {
    var selectedMaterial = $("#SeletorEntrada").val();
    Nome(selectedMaterial);
    Codigo(selectedMaterial);
    Descricao(selectedMaterial);
    Local(selectedMaterial);
  }

  function Nome(selectedMaterial) {
    $.ajax({
      type: 'POST',
      url: '../models/funcao_nome.php',
      data: { material: selectedMaterial },
      success: function (data) {
        $('#material').val(data);
      },
      error: function (xhr, status, error) {
        alert("Erro: " + error);
      }
    });
  }

  function Codigo(selectedMaterial) {
    $.ajax({
      type: 'POST',
      url: '../models/funcao_codigo.php',
      data: { material: selectedMaterial },
      success: function (data) {
        $('#codigo').val(data);
      },
      error: function (xhr, status, error) {
        alert("Erro: " + error);
      }
    });
  }

  function Descricao(selectedMaterial) {
    $.ajax({
      type: 'POST',
      url: '../models/funcao_descricao.php',
      data: { material: selectedMaterial },
      success: function (data) {
        $('#descricao').val(data);
      },
      error: function (xhr, status, error) {
        alert("Erro: " + error);
      }
    });
  }

  function Local(selectedMaterial) {
    $.ajax({
      type: 'POST',
      url: '../models/funcao_local.php',
      data: { material: selectedMaterial },
      success: function (data) {
        $('#local').val(data);
      },
      error: function (xhr, status, error) {
        alert("Erro: " + error);
      }
    });
  }
</script>

<!-- Tabela Visualizações -->
<script>
  $(document).ready(function() {
    var table = $('#visualizar').DataTable({
      scrollY: "400px",
      scrollX: true,
      responsive: true,
      paging: true,
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
      },
      columnDefs: [{
        className: 'dt-body-center',
        render: function(data, type, row) {
          if (type === 'display') {
            return '<div class="divScroll">' + data + '</div>';
          }
          return data;
        }
      }],
      initComplete: function() {
        this.api().columns().every(function() {
          var that = this;
          $('input', this.header()).on('keyup change clear', function() {
            if (that.search() !== this.value) {
              that.search(this.value).draw();
            }
          });
        });
      },
      order: [[0, 'asc']],
      lengthChange: false,
      dom: 'Brtip',
      buttons: [],
      displayLength: 10,
    });

    $('#visualizar thead tr').clone(true).appendTo('#visualizar thead');
    $('#visualizar thead tr:eq(1) th').each(function(i) {
      var title = $(this).text();
      $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
      $('input', this).on('keyup change', function() {
        if (table.column(i).search() !== this.value) {
          table.column(i).search(this.value).draw();
        }
      });
    });
  });
</script>