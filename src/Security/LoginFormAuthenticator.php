<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Bundle\SecurityBundle\Security;


class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    private $authorizationChecker;
    private $urlGenerator;

    public const LOGIN_ROUTE = 'app_login';

public function __construct(UrlGeneratorInterface $urlGenerator, AuthorizationCheckerInterface $authorizationChecker)
{
    $this->urlGenerator = $urlGenerator;
    $this->authorizationChecker = $authorizationChecker;
}

public function authenticate(Request $request): Passport
{
    $email = $request->request->get('email', '');
    $password = $request->request->get('password', '');
    $csrfToken = $request->request->get('_csrf_token');

    $request->getSession()->set(Security::LAST_USERNAME, $email);

    $userBadge = new UserBadge($email);
    $passwordCredentials = new PasswordCredentials($password);
    $csrfTokenBadge = new CsrfTokenBadge('authenticate', $csrfToken);
    $rememberMeBadge = new RememberMeBadge();

    return new Passport(
        $userBadge,
        $passwordCredentials,
        [$csrfTokenBadge, $rememberMeBadge]
    );
}

public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
{
    $roles = ['ROLE_STUDENT' => 'app_student_dashboard', 'ROLE_TEACHER' => 'app_teacher_dashboard', 'ROLE_ADMIN' => 'app_admin_user_index'];

    foreach ($roles as $role => $route) {
        if ($this->authorizationChecker->isGranted($role)) {
            return new RedirectResponse($this->urlGenerator->generate($route));
        }
    }

    return new RedirectResponse($this->urlGenerator->generate('home'));
}

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
