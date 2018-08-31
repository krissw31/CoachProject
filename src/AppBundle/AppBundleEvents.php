<?php

namespace AppBundle;
/// Créer la liste des events à envoyer au dispatcher

final class AppBundleEvents{
    const  ON_CONTACT = "on.contact";
    const ON_CONTACT_NEWS = "on.contact.news";
    const ON_CONTACT_DELETE_NEWS = "on.contact.delete.news";
    const  ON_ADMIN_CONTACT = "on.admin.contact";
    const ON_NEWSLETTER = "on.newsletter";
}

