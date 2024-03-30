<?php

function alertPrimary($objet, $message) {

    echo
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">'
      . '<strong>' . $objet . ' : </strong>' . htmlspecialchars($message) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}

function alertSecondary($objet, $message) {

    echo
        '<div class="alert alert-secondary alert-dismissible fade show" role="alert">'
      . '<strong>' . $objet . ' : </strong>' . htmlspecialchars($message) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}

function alertSuccess($objet, $message) {

    echo
        '<div class="alert alert-success alert-dismissible fade show" role="alert">'
      . '<strong>' . $objet . ' : </strong>' . htmlspecialchars($message) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}

function alertDanger($objet, $message) {

    echo
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
      . '<strong>' . $objet . ' : </strong>' . htmlspecialchars($message) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}

function alertWarning($objet, $message) {

    echo
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
      . '<strong>' . $objet . ' : </strong>' . htmlspecialchars($message) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}

function alertInfo($objet, $message) {

    echo
        '<div class="alert alert-info alert-dismissible fade show" role="alert">'
      . '<strong>' . $objet . ' : </strong>' . htmlspecialchars($message) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}

function alertLight($objet, $message) {

    echo
        '<div class="alert alert-light alert-dismissible fade show" role="alert">'
      . '<strong>' . $objet . ' : </strong>' . htmlspecialchars($message) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}

function alertDark($objet, $message) {

    echo
        '<div class="alert alert-dark alert-dismissible fade show" role="alert">'
      . '<strong>' . $objet . ' : </strong>' . htmlspecialchars($message) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}

?>