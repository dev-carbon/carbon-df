<footer class="footer has-background-black-ter">
    <div class="container">
        <div class="columns is-centered mb-6">
            <div class="column">
                <div class="columns">
                    <div class="column">
                        <h3 class="has-text-white is-size-4 mb-3">Services</h3>
                        <ul class="has-text-grey-light">
                            <li>Service 1</li>
                            <li>Service 2</li>
                            <li>Service 3</li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3 class="has-text-white is-size-4 mb-3">Information</h3>
                        <p class="has-text-grey-light">
                            Adresse: 123 Rue de la République, Cityville<br>
                            Téléphone: +1 234 567 890<br>
                            Email: <a class="has-text-info" href="mailto:contact@dailyfoods.com">contact@dailyfoods.com</a>
                        </p>
                    </div>
                </div>

                <div class="container mt-6">
                    <h2 class="title is-2 has-text-warning">À propos de nous</h2>
                    
                    <p class="has-text-light">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam maiores molestiae quae id, repellendus recusandae incidunt qui cupiditate soluta nobis amet! Dignissimos ex assumenda saepe reiciendis aspernatur dolorem voluptatum quae.</p>
                    <p class="has-text-light content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam maiores molestiae quae id, repellendus recusandae incidunt qui cupiditate soluta nobis amet! Dignissimos ex assumenda saepe reiciendis aspernatur dolorem voluptatum quae.</p>
                    <a href="{{ route('about-us')}}" class="button is-link">Voir plus</a>
                </div>
            </div>

            <div class="column is-5">
                <div class="box has-background-grey-darker has-shadow">
                    <h3 class="subtitle has-text-primary is-size-3 mb-3">Contactez-nous</h3>
                    <form>
                        <div class="field">
                            <label class="label has-text-white">Nom</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Votre nom">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label has-text-white">Email</label>
                            <div class="control has-icons-left">
                                <input class="input" type="email" placeholder="Votre adresse email">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label has-text-white">Message</label>
                            <div class="control has-icons-left">
                                <textarea class="textarea" placeholder="Votre message"></textarea>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-light">
                                    <span>Envoyer</span>
                                    <span class="icon">
                                        <i class="fas fa-paper-plane"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="content mt-6">
            <p class="has-text-white">
                &copy; {{ date('Y') }} <span class="has-text-">Daily</span><strong
                    class="has-text-info">Foods</strong> by
                <a class="has-text-info" href="mailto:luc.deeno@dailyfoods.com">Luc Deenoo</a>.
            </p>
        </div>
    </div>
</footer>
