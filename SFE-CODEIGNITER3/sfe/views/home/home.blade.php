<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SFE - Sistema Ferroviário Estadual</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{base_url('application/modules/sfe/views/home/home.css')}}">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{base_url('assets/bootstrap4/css/bootstrap.min.css')}}">
    <!--  font awesome -->
    <link rel="stylesheet" href="{{base_url('assets/font-awesome/css/all.min.css')}}">
</head>

<body>
    <!-- HEADER -->
    <header id="site-header" class="sticky-header">
        <div class="main container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="header-wrapper">
                        <div class="site-name-wrapper">
                            <a class="icone-menu" href="{{base_url('sfe/home')}}">
                                <span class="sr-only">Abrir menu principal de navegação</span>
                                <span class="fa fa-bars fa-2x text-success" aria-hidden="true"></span>
                            </a>
                            <div>
                                <h2 class="descricao-menu"> Sistemas de Ferrovias Estadual - SFE</h2>
                            </div>
                        </div>
                        <div role="combobox" aria-expanded="false" aria-haspopup="listbox" aria-labelledby="searchtext-label">
                            <form class="aa-Form" action="#" novalidate="" role="search">
                                <div class="aa-InputWrapperPrefix">
                                    <label class="aa-Label" for="searchtext-input" id="searchtext-label">
                                        <button class="aa-SubmitButton" type="submit" title="Submit">
                                            <svg class="aa-SubmitIcon" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                                            </svg>
                                        </button>
                                    </label>
                                </div>
                                <div>
                                    <input placeholder="O que você procura?" maxlength="512" type="search" class="input-pesquisa">
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </header>
    <!-- FIM DO HEADER -->

    <!-- CONTAINER -->
    <div class="container conteudo">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <h2 class="titulo">
                        SISTEMA FERROVIÁRIO ESTADUAL
                    </h2>


                    <p style="text-align: justify;" data-mce-style="text-align: justify;">
                        <span>
                            As ferrovias são um dos meios de transporte mais eficientes e sustentáveis a disposição dos sistemas de logística em todo o mundo.
                            Com grande competitividade no transporte de cargas, como graneis agrícolas e minerais, a opção pelo transporte ferroviário se apresenta
                            como uma grande oportunidade de redução dos custos logísticos dos setores agropecuário, mineral e industrial do estado de Goiás.
                        </span>
                    </p>

                    <p style="text-align: justify;" data-mce-style="text-align: justify;">
                        <span>
                            Em Goiás, a malha ferroviária federal conta com a Ferrovia Norte-Sul, a Ferrovia Centro Atlântico.
                            Em breve o primeiro trecho da Ferrovia de Integração do Centro Oeste também será concluído no estado.
                        </span>
                    </p>

                    <p style="text-align: justify;" data-mce-style="text-align: justify;">
                        <span>
                            Visando incentivar a expansão do transporte ferroviário, através da capilarização da malha com a implantação de ramais
                            e linhas alimentadoras dos grandes corredores ferroviários, o Governo de Goiás instituiu o Sistema Ferroviário Estadual,
                            <a href="{{base_url('assets/goinfra/sfe/LEI_21.882.pdf')}}" rel="noopener noreferrer" tabindex="-1" target="_blank" title="LEI Nº 21.882, DE 24 DE ABRIL DE 2023.">
                                Lei Estadual 21.882, de 24 de abril de 2023.
                            </a>
                        </span>
                    </p>

                    <br>
                    <br>

                    <p class="callout"><strong><span>AUTORIZAÇÕES FERROVIÁRIAS</span></strong></p>
                    <p style="text-align: justify;" data-mce-style="text-align: justify;">
                        A
                        <a href="{{base_url('assets/goinfra/sfe/LEI_21.882.pdf')}}" rel="noopener noreferrer" tabindex="-1" target="_blank" title="LEI Nº 21.882, DE 24 DE ABRIL DE 2023.">
                            Lei Estadual 21.882, de 24 de abril de 2023
                        </a>
                        , dispõe sobre o Sistema Ferroviário do Estado de Goiás - SF/GO e os regimes de
                        exploração dos serviços de transporte ferroviário de cargas e de passageiros, também dá outras providências.
                        Dentre os regimes de exploração dos serviços ferroviários, está prevista a exploração em regime privado, mediante outorga
                        de Autorização Ferroviária pelo Estado de Goiás.
                    </p>
                    <p style="text-align: justify;" data-mce-style="text-align: justify;">
                        O objetivo desse regime de exploração é a promoção da realização de investimentos privados no setor ferroviário.
                        A lei regulamenta o trâmite desde a apresentação do requerimento de Autorização Ferroviária até a assinatura do contrato de adesão.
                        A seguir é apresentado o fluxograma simplificado do processo:
                    </p>

                    <!-- Imagem FLuxograma -->
                    <div class="fluxograma-processo">
                        <img class="img-fluid" src="{{base_url('assets/goinfra/sfe/bg-logotipo.png')}}" alt="Descrição da Imagem">
                    </div>

                    <p style="text-align: justify;" data-mce-style="text-align: justify;"><br>
                    </p>

                    <p class="callout" style="text-align: justify;" data-mce-style="text-align: justify;">
                        <strong>Do Requerimento</strong>
                    </p>
                    <p>
                        Para a apresentação do requerimento de Autorização Ferroviária, o interessado deverá encaminhar a documentação necessária através
                        do link “Encaminhar Requerimento” abaixo. A lista da documentação e a minuta do contrato também estão disponíveis nos botões a seguir:
                    </p>

                    <div class="botoes">
                        <!-- Formulário de cadastro -->
                        <div class="govbr-cards centralizar-cars">
                            <div class="wrapper">
                                <div class="card card-tamanho">
                                    <a class="govbr-card-content" href="{{base_url('sfe/formulario/formulario')}}">
                                        <span class="front">
                                            <span aria-hidden="true" class="fas fa-tasks icone"></span>
                                            <span class="titulo">
                                                Formulário de Cadastro e Envio da Documentação
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Fim Formulário de cadastro -->
                        <!-- Formulário Word e LEI-->
                        <div class="govbr-cards centralizar-cars">
                            <div class="wrapper">
                                <div class="card card-tamanho">
                                    <a class="govbr-card-content" href="{{base_url('assets/goinfra/sfe/formulário_sfe.docx')}}">
                                        <span class="front">
                                            <span aria-hidden="true" class="fas fa-file-alt icone icone"></span>
                                            <span class="titulo">Formulário Word
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div class="card card-tamanho">
                                    <a class="govbr-card-content" href="{{base_url('assets/goinfra/sfe/LEI_21.882.pdf')}}" rel="noopener noreferrer" tabindex="-1" target="_blank">
                                        <span class="front">
                                            <span aria-hidden="true" class="fas fa-book icone"> </span>
                                            <span class="titulo">
                                                LEI Nº 21.882, DE 24 DE ABRIL DE 2023
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Fim Formulário Word e LEI-->
                        <!-- Acompanhe  -->
                        <div class="govbr-cards centralizar-cars">
                            <div class="wrapper">
                                <div class="card card-tamanho">
                                    <a class="govbr-card-content" href="{{base_url('sfe/solicitante/home')}}">
                                        <span class="front">
                                            <span aria-hidden="true" class="fas fa-tasks icone"></span>
                                            <span class="titulo">
                                                Acompanhe sua solicitação!
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Acompanhe  -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- FIM CONTAINER -->

    <script src="{{base_url('assets/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script src="{{base_url('application/modules/sfe/views/home/home.js')}}"></script>
</body>

</html>