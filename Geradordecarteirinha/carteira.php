<?php
session_start();
if (!isset($_SESSION['login'])) {
    $_SESSION['locked'] = 'Acesso bloqueado';
    header('location: index.php');
}
$nome = $_SESSION['txtNome'];
$nascimento = $_SESSION['dtaNascimento'];
$cpf = $_SESSION['txtCpf'];
$curso = $_SESSION['slcCurso'];
$matricula = $_SESSION['txtMat'];
$foto = $_SESSION['flFoto'];
echo '
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Carteirinha IFMG</title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                body {
                    font-family: Arial, sans-serif;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    min-height: 100vh;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    padding: 20px;
                }
                .carteirinha-container {
                    background: white;
                    width: 850px;
                    height: 540px;
                    border-radius: 30px;
                    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                    overflow: hidden;
                    position: relative;
                }
                .faixa-verde {
                    position: absolute;
                    top: 130px;
                    left: 8px;
                    width: 840px;
                    height: 80px;
                    background: linear-gradient(90deg, #002913, #00843D);
                    z-index: 1;
                }
                table {
                    border-collapse: collapse;
                    width: 850px;
                    height: 540px;
                    position: relative;
                    z-index: 2;
                    table-layout: fixed;
                }
                .botoes-container {
                    display: flex;
                    justify-content: center;
                    gap: 20px;
                    margin-top: 25px;
                }
                .btn {
                    font-size: 16px;
                    padding: 10px 18px;
                    border: none;
                    border-radius: 12px;
                    cursor: pointer;
                    transition: 0.2s ease;
                    font-weight: bold;
                }
                .btn-pdf {
                    background-color: #00843D;
                    color: white;
                }
                .btn-imprimir {
                    background-color: #004b23;
                    color: white;
                }
                .btn:hover {
                    opacity: 0.9;
                    transform: scale(1.02);
                }
                @media print {
                    body {
                        background: white !important;
                        margin: 0;
                        padding: 0;
                    }
                    .botoes-container {
                        display: none !important;
                    }
                    .carteirinha-container {
                        box-shadow: none !important;
                        margin: 0 auto !important;
                        page-break-inside: avoid;
                        transform: scale(1);
                        transform-origin: top left;
                        width: 850px !important;
                        height: 540px !important;
                    }
                    @page {
                        size: landscape;
                        margin: 0;
                    }
                }
            </style>
        </head>
        <body>
            <div class="carteirinha-container" id="carteirinha">
                <div class="faixa-verde"></div>
                <table border="0px" width="850px" height="540px">
                    <tr>
                        <td align="left" height="130px" width="650px" style="padding-left: 15px;">
                            <img src="img/Logo_ifmg.png" alt="Logo_ifmg" width="350px" height="90px" crossorigin="anonymous">
                        </td>
                        <td rowspan="3" align="left" style="padding-top: 15px;">
                            <img src="'. $foto .'" alt="foto" width="180px" height="240px">
                        </td>
                    </tr>
                    <tr>
                        <td height="80px" align="left" bgcolor="transparent" style="color: white; font-size: large; padding-left: 15px;">
                            '. $nome . '
                        </td>
                    </tr>
                    <tr>
                        <td height="44px" style="padding-left: 15px;">
                            Data de nascimento: '. $nascimento .'
                        </td>
                    </tr>
                    <tr>
                        <td height="44px" style="padding-left: 15px;">
                            CPF: '. $cpf .'
                        </td>
                        <td rowspan="2" style="white-space: nowrap; font-size: 12px; line-height: 1.8; vertical-align: bottom;">
                            Este documento foi emitido<br>
                            pelo SUAP em 28/10/2025.<br>
                            Para comprovar sua autenticidade<br>
                            acesse o QrCode abaixo.
                        </td>
                    </tr>
                    <tr>
                        <td height="44px" style="padding-left: 15px;">
                            Curso: '. $curso .'
                        </td>  
                    </tr>
                    <tr>
                        <td height="44px" style="padding-left: 15px;">       
                        </td>
                        <td align="center" style="font-weight: bold; white-space: nowrap; font-size: 10px; vertical-align: bottom;">
                            <b>USO PESSOAL E INTRANSFER&Iacute;VEL</b>
                        </td>
                    </tr>
                    <tr>
                        <td height="44px" style="padding-left: 15px;">
                            Matr&iacute;cula: '. $matricula .'  -  Validade: 28/10/2026
                        </td>
                        <td rowspan="2" align="center">
                            <img src="img/QRcode.png" alt="QRcode" height="140px" width="140px" crossorigin="anonymous">
                        </td>
                    </tr>
                    <tr>
                        <td height="100px" width="650px" style="padding-left: 15px;" align="left">
                            <img src="img/codigo_barras.jpg" alt="codigo_barras" height="90px" width="600px" crossorigin="anonymous">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="botoes-container">
                <button class="btn btn-pdf" id="btnPdf">📄 Exportar para PDF</button>
                <button class="btn btn-imprimir" id="btnImprimir">🖨️ Imprimir</button>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
            <script>
                document.getElementById("btnPdf").addEventListener("click", async function() {
                const botao = this;
                botao.disabled = true;
                botao.textContent = "⏳ Gerando PDF...";                
                try {
                    const elemento = document.getElementById("carteirinha");
                    const largura = elemento.offsetWidth;
                    const altura = elemento.offsetHeight;
                    const canvas = await html2canvas(elemento, {
                        scale: 3,
                        useCORS: true,
                        backgroundColor: "#ffffff",
                        logging: false
                    });
                    const imgData = canvas.toDataURL("image/png");
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF({
                        orientation: "landscape",
                        unit: "px",
                        format: [largura, altura]
                    });
                    pdf.addImage(imgData, "PNG", 0, 0, largura, altura);
                    pdf.save("carteirinha_ifmg_<?php echo $matricula; ?>.pdf");
                    botao.disabled = false;
                    botao.textContent = "✅ PDF gerado!";
                    setTimeout(() => {
                        botao.textContent = "📄 Exportar para PDF";
                    }, 2000);
                } catch (erro) {
                    console.error("Erro completo:", erro);
                    alert("Erro: " + erro.message + "\n\nTente usar o botão Imprimir e salvar como PDF.");
                    botao.disabled = false;
                    botao.textContent = "📄 Exportar para PDF";
                }
            });
            document.getElementById("btnImprimir").addEventListener("click", function() {
                const carteirinha = document.getElementById("carteirinha").outerHTML;
                const janela = window.open("", "_blank");
                janela.document.write(`
                    <html>
                    <head>
                        <title>Imprimir Carteirinha</title>
                        <style>
                            @page {
                                size: landscape;
                                margin: 0;
                            }
                            body {
                                margin: 0;
                                padding: 0;
                                background: white;
                            }
                            .carteirinha-container {
                                width: 850px;
                                height: 540px;
                                margin: 0 auto;
                                position: relative;
                                background: white;
                            }
                            .faixa-verde {
                                position: absolute;
                                top: 130px;
                                left: 8px;
                                width: 840px;
                                height: 80px;
                                background: linear-gradient(90deg, #002913, #00843D);
                                z-index: 1;
                                -webkit-print-color-adjust: exact !important;
                                print-color-adjust: exact !important;
                            }
                            table {
                                border-collapse: collapse;
                                width: 850px;
                                height: 540px;
                                position: relative;
                                z-index: 2;
                                table-layout: fixed;
                            }
                        </style>
                    </head>
                    <body>${carteirinha}</body>
                    </html>
                `);
                janela.document.close();
                janela.focus();
                janela.print();
            });
            </script>
        </body>
    </html>
    ';
?>