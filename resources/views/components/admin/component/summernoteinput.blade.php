@props(['title', 'name', 'value'])

<div class=" w-full">
    <div class=" w-full flex flex-col max-w-full gap-2 text-sm sm:text-base font-medium">
        <label for="summernote">{{$title}}</label>
        <textarea id="summernote" name="{{$name}}">{!! nl2br($value == '' ? '' : $value) !!}</textarea>
    </div>
</div>
<script>
    window.addEventListener('load', function summernote() {
        jQuery(document).ready(function($) {
            $('#summernote').summernote({
                height: 300,
                popover: {
                    table: []
                },
                toolbar: [
                    ['style', ['style']], 
                    ['font', ['bold', 'italic', 'underline']], 
                    ['para', ['ul', 'ol', 'paragraph']], 
                    ['insert', ['link']], 
                    ['view', ['fullscreen']],
                    ['table', ['table', 'mergeCells']],
                ],
                styleTags: [
                    { title: 'Paragraph', tag: 'p', value: 'p' },
                    { title: 'Heading', tag: 'h3', value: 'h3' },
                ],
                buttons: {
                    mergeCells: function (context) {
                        var ui = $.summernote.ui;
                        var button = ui.button({
                            contents: `
                                <div class=" w-4 h-[20.5px] flex items-center relative group">
                                    <svg viewBox="0 0 24 24" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"><g><path d="M0 0H24V24H0z" fill="none"/><path d="M20 3c.552 0 1 .448 1 1v16c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V4c0-.552.448-1 1-1h16zm-9 2H5v5.999h2V9l3 3-3 3v-2H5v6h6v-2h2v2h6v-6h-2v2l-3-3 3-3v1.999h2V5h-6v2h-2V5zm2 8v2h-2v-2h2zm0-4v2h-2V9h2z"/></g></svg>
                                    <div class="absolute top-full mt-4 left-1/2 transform -translate-x-1/2 px-2 py-1.5 text-xs text-white bg-black opacity-0 group-hover:opacity-100 transition z-50">
                                        Merge Cell
                                    </div>
                                </div>
                            `,
                            click: function () {
                                const cells = (window._selectedTableCells && window._selectedTableCells()) || [];

                                if (cells.length < 2) {
                                    alert('Pilih minimal 2 sel tabel untuk merge');
                                    return;
                                }

                                // Pastikan semua cell berada di baris (tr) yang sama
                                const firstRow = $(cells[0]).closest('tr')[0];
                                const sameRow = cells.every(cell => $(cell).closest('tr')[0] === firstRow);

                                if (!sameRow) {
                                    alert('Merge hanya dapat dilakukan pada kolom yang berada dalam satu baris');
                                    return;
                                }

                                let totalColspan = 0;
                                let mergedContent = '';

                                cells.forEach((cell, i) => {
                                    totalColspan += parseInt($(cell).attr('colspan')) || 1;
                                    mergedContent += $(cell).html() + (i < cells.length - 1 ? ' ' : '');
                                    if (i !== 0) $(cell).remove(); // Keep the first cell
                                });

                                const firstCell = $(cells[0]);
                                firstCell.html(mergedContent).attr('colspan', totalColspan);
                                $('td').removeClass('selected-cell');
                            }
                        });
                        return button.render();
                    }
                }
            });
            let isMouseDown = false;
            let isSelecting = false;
            let selectedCells = [];
            let baseRow = null;
            let mouseDownTimer = null;

            $('.note-editable').on('mousedown', 'td', function (e) {
                e.preventDefault();
                const cell = this;
                $('td').removeClass('selected-cell');
                selectedCells = [cell];
                baseRow = $(cell).closest('tr')[0];

                mouseDownTimer = setTimeout(() => {
                    // Jika ditahan >200ms, maka masuk ke mode seleksi
                    isMouseDown = true;
                    isSelecting = true;
                    $(cell).addClass('selected-cell');
                }, 200);
            });

            $('.note-editable').on('mouseup', 'td', function (e) {
                clearTimeout(mouseDownTimer);

                // Jika mouse tidak diseret (isSelecting false), langsung fokus teks
                if (!isSelecting) {
                    const range = document.createRange();
                    range.selectNodeContents(this);
                    const sel = window.getSelection();
                    sel.removeAllRanges();
                    sel.addRange(range);
                }

                isMouseDown = false;
                isSelecting = false;
            });

            $('.note-editable').on('mouseover', 'td', function (e) {
                if (isMouseDown && isSelecting) {
                    const currentRow = $(this).closest('tr')[0];
                    if (currentRow === baseRow && !selectedCells.includes(this)) {
                        selectedCells.push(this);
                        $(this).addClass('selected-cell');
                    }
                }
            });

            $(document).on('mouseup', function () {
                clearTimeout(mouseDownTimer);
                isMouseDown = false;
                isSelecting = false;
            });

            // Simpan ke global untuk tombol merge
            window._selectedTableCells = function () {
                return selectedCells;
            };
        });
    });
</script>
<style>
    /* Override gaya default Tailwind untuk h1 hingga h6 */
    .note-editor h1, h2, h3, h4, h5, h6 {
    font-size: inherit !important;nt;
    color: inherit !important;
    line-height: inherit !important;
    margin: 0 !important;
    padding: 0 !important;
    }

    td.selected-cell {
        background-color: rgba(100, 149, 237, 0.3); /* light blue highlight */
    }

    /* Kustomisasi tambahan untuk masing-masing elemen heading */
    .note-editor table {
        table-layout: fixed;
        width: 100%;
        max-width: 100% !important;
        border-color: black !important;
    }

    .note-editor td, .note-editor th {
        width: auto;
        word-break: break-word;
        overflow-wrap: break-word;
        border-color: black !important;
        font-size: 0.875rem !important;
        line-height: 1.25rem !important;
    }

    .note-editor ol {
        padding-left: 16px;
        list-style-type: decimal;
    }

    .note-editor ul {
        padding-inline-start: 16px !important;
        padding-left: 16px;
        list-style-type: disc;
    }

    .note-editor span {
        font-size: inherit !important;
    }

    .note-editor p {
        font-size: 0.875rem !important;
        line-height: 1.25rem !important;
    }

    .note-editor li {
        font-size: 0.875rem !important;
        line-height: 1.25rem !important;
    }

    .note-editor h1 {
        font-size: 1.875rem !important;
        line-height: 2.25rem !important;
    }

    .note-editor h2 {
        font-size: 1.5rem !important;
        line-height: 2rem !important;
    }

    .note-editor h3 {
        font-size: 1rem !important;
        line-height: 1.5rem !important;
    }

    .note-editor h4 {
        font-size: 1rem !important;
        line-height: 1.5rem !important;
    }

    .note-editor h5 {
        font-size: 0.75rem !important;
        line-height: 1.25rem !important;
    }

    .note-editor h6 {
        font-size: 0.5rem !important;
        line-height: 0.75rem !important;
    }

    .note-editable > * + * {
        margin-top: 0 !important;
    }

    @media screen and (min-width: 640px) {
        .note-editor td {
            font-size: 1rem !important;
            line-height: 1.5rem !important;
        }
        .note-editor p {
            font-size: 1rem !important;
            line-height: 1.5rem !important;
        }
        .note-editor li {
            font-size: 1rem !important;
            line-height: 1.5rem !important;
        }
        .note-editor h3 {
            font-size: 1.25rem !important;
            line-height: 1.75rem !important;
        }
        .note-editable > * + * {
            margin-top: 0 !important;
        }
    }

    .note-editable {
        background-color: white;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }

    .note-editor {
        max-width: 100%;
        border-color: #3b82f6 !important;
        /* background-color: #f5f5f5 !important; */
        border-radius: 0.375rem !important;
    }
    
    .note-toolbar {
        border-radius: 0.375rem 0.375rem 0 0 !important;
    }

    .note-modal {
        transform: translateY(-50%);
        top: 50%;
    }
</style>