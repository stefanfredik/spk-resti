<?= $this->extend('temp/index'); ?>
<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Filter Data
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">Tahun</div>
                    <div class="col-lg-2">
                        <select class="form-control" name="tahun" id="tahun">
                            <?php for ($i = 2020; $i < 2030; $i++) : ?>
                                <option value=""><?= $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>


                    <div class="col-lg-2">Periode</div>
                    <div class="col-lg-2">
                        <select class="form-control" name="periode" id="periode">
                            <?php for ($i = 1; $i < 6; $i++) : ?>
                                <option value=""><?= $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <input type="button" class="btn btn-primary" value="Filter">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a target="__blank" class="btn btn btn-primary my-2" href="/laporan/cetakbantuan"><i class="bi bi-printer-fill mx-2"></i>Cetak Laporan</a>
<div class="row">
    <div class="col">
        <div class="card  shadow">
            <div class="card-header">
                <h3><?= $title; ?></h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <?= $this->include("laporan/table/dataBantuan"); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("script"); ?>
<script>
    const config = {
        columnDefs: [{
            width: 20,
            targets: 0
        }],
        language: {
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: ' <i class="bi bi-arrow-right-circle"></i>',
                previous: '<i class="bi bi-arrow-left-circle"></i>'
            },
            zeroRecords: "Belum ada data.",
            search: "Cari:",
            lengthMenu: "Tampil _MENU_ kolom",
            info: "Kolom _START_ sampai _END_ dari _TOTAL_ kolom"
        }
    };

    // $('#table').DataTable(config)

    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#table thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#table thead');

        var table = $('#table').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function() {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input class="form-control" type="text" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('change', function(e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value + ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    });
</script>
<?= $this->endSection(); ?>