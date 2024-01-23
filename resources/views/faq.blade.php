<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FAQ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('user/css/faq-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- font awasome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">
    <x-navbar_user />

    <!-- FAQ -->
    <section id="faq" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">FAQ</h1>
                        <div class="line"></div>
                        <p>
                            Les questions les plus fréquemment posées.</p>
                    </div>
                </div>
            </div>
            <div class="questions-container" data-aos="fade-down" data-aos-delay="250">
                <div class="question">
                    <button id="questionButton">
                        <span>Quelles sont les exigences générales pour la location d'une voiture?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Les exigences générales pour la location d'une voiture comprennent un numéro de téléphone valide, une carte d'identité valide et
                        Age minimum de 18 ans.</p>
                </div>

                <div class="question">
                    <button id="questionButton">
                        <span>Puis-je annuler ma commande après qu'elle ait été vérifiée?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>
                       Désolé, c'est dommage, vous ne pouvez pas annuler votre commande après la vérification de la commande.
                    </p>
                </div>

                <div class="question">
                    <button id="questionButton">
                        <span>Quelles méthodes de paiements sont disponibles?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Lorsque votre commande a été vérifiée, vous pouvez d'abord effectuer des paiements à travers
                        transfert bancaire au numéro de compte qui a été répertorié</p>
                </div>

                <div class="question">
                    <button id="questionButton">
                        <span>
                            Y a-t-il des frais supplémentaires que je dois payer autres que le prix de location?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Oui, il y a des frais supplémentaires que vous devrez peut-être payer, comme les frais de dommage et les frais
                        de retour en retard.</p>
                </div>

                <div class="question">
                    <button id="questionButton">
                        <span>Y a-t-il une limite de temps pour la location de voitures?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Le temps de location de voiture a un tarif quotidien, calculé à partir du jour où la voiture vous est remise. </p>
                </div>

                <div class="question">
                    <button id="questionButton">
                        <span>Quelle est la procédure de prise et de retour de la voiture? </span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>1. Vous devez commander la voiture que vous souhaitez louer en premier via la demande <br>
                        2. Une fois la commande vérifiée, rendez-vous sur le lieu de location avec les documents requis
                        et signer le contrat de location.<br>
                        3. Après avoir rencontré notre équipe, vous pouvez apporter la voiture qui a été commandée. <br>
                        4. Lorsque vous retournez, vous retournerez la voiture à l'emplacement de location.À votre retour,
                        nous vérifierons l'état de la voiture et la durée du retour.S'il y a un retard ou
                        Dommages à la voiture, vous devez alors payer des frais supplémentaires.</p>
                </div>

                <div class="question">
                    <button id="questionButton">
                        <span>Dois-je faire le plein de mon propre carburant?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Oui, nous nous attendons à ce que vous remplissiez votre propre carburant avant de retourner la voiture.S'assurer
                        de retourner la voiture avec le même niveau de carburant que lorsque vous l'acceptez.</p>
                </div>



            </div>
    </section>

    <x-footer_user />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>


</body>

</html>
