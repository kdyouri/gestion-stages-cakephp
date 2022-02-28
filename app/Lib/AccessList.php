<?php


class AccessList {

    /**
     * ACL
     *
     * @var array
     */
    private const _ACL = [
        'Etudiant' => [
            '/utilisateurs/profile',
            '/stages/index',
            '/stages/add',
            '/stages/edit',
            '/stages/delete',
        ],
        'Enseignant' => [
            '/utilisateurs/profile',
            '/stages/all',
            '/stages/encadrer',
            '/stages/valider',
            '/stages/noter',
        ],
        'Administrateur' => [
            '/utilisateurs/profile',
            '/stages/all',
            '/stages/par_enseignant',
            '/stages/sans_encadrant',
            '/stages/sans_rapport',
            '/stages/valides_pour_soutenance',
            '/stages/notes_attribues',
        ],
    ];

    /**
     * @param array $user
     * @param array|string $url
     * @return bool
     */
    public static function isAuthorized($user, $url) {
        if (is_array($url)) {
            $url = Router::url($url);
        }
        if (preg_match('/^(#|http)/', $url)) {
            return true;
        }
        $params = Router::parse($url);

        // Action :
        $actionPath = "/{$params['controller']}/{$params['action']}";
        if (isset($params['plugin'])) $actionPath = "/{$params['plugin']}$actionPath";

        // Rôle :
        $role = @$user['role'];

        if ($actionPath && $role) {
            if (isset(static::_ACL[$role])) {
                return in_array($actionPath, static::_ACL[$role]);
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}