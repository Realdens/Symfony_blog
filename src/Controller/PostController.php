<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('post/home.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    #[Route('/post/{id}', name: 'post_view')]
    public function post($id): Response
    {
        return $this->render('post/view.html.twig', [
            'post' => [
                'title' => 'Le titre de l\'article',
                'content' => '

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at mauris at lacus lobortis congue vel a massa. Nulla imperdiet sapien sollicitudin diam interdum, id commodo nulla feugiat. Vestibulum dapibus nunc egestas lectus fringilla accumsan. Nunc vulputate eros quis massa gravida tincidunt. Aliquam nec libero purus. Ut vitae dolor vitae dolor porta eleifend ac a nulla. Aliquam erat volutpat. Sed faucibus, est eu rhoncus dapibus, libero ligula mattis magna, a condimentum est eros et nibh.
                
                Etiam eget leo a ligula feugiat vestibulum. Vivamus egestas nisl mi, ut elementum erat ullamcorper eget. Etiam tempus suscipit pretium. Sed rhoncus aliquam leo et pretium. Pellentesque mattis leo non lobortis mattis. Nunc a varius urna. Nulla turpis turpis, molestie eget lacinia ut, vehicula vel nulla. Proin blandit purus condimentum sem luctus, sagittis tempor nibh porttitor.
                
                Nulla porttitor congue metus, dapibus tempus orci egestas in. Sed non magna mattis, semper justo id, pretium eros. Integer purus neque, dignissim in elementum nec, congue ac nunc. Suspendisse potenti. Nullam in finibus lacus. Nunc lobortis eleifend imperdiet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur rutrum et ligula id tempor. Curabitur sed felis erat.
                
                Sed tincidunt purus at ex egestas, a placerat orci sollicitudin. Donec varius mollis odio vel tempor. Duis vehicula ipsum arcu, feugiat pretium nunc eleifend non. Quisque ac nisi ut nibh elementum dapibus. Praesent id sapien vestibulum, tempus tellus non, feugiat nunc. In iaculis commodo varius. Donec quis tempor lorem, vitae suscipit ex. Nulla tincidunt purus a purus ultrices, consequat pulvinar est viverra. Mauris scelerisque velit eros, congue pellentesque urna tristique at. Morbi auctor maximus sapien, eget auctor odio placerat suscipit. Nullam venenatis pellentesque orci eget vestibulum.
                
                Vestibulum id ultrices libero. Donec nibh leo, tempor feugiat nibh at, ullamcorper convallis enim. Quisque fringilla nisl ac tincidunt euismod. Nulla porttitor eu eros sed laoreet. Sed porttitor et leo suscipit bibendum. Aliquam maximus vitae erat pretium dictum. Cras finibus malesuada est. Phasellus eget accumsan nisi. Etiam mattis mauris dapibus sapien interdum, placerat sodales justo efficitur. In dictum orci lacus, vitae condimentum elit ultrices nec. Pellentesque congue iaculis elementum. Quisque nunc enim, elementum id massa id, tempus feugiat ex. Cras ornare, ligula ac aliquet feugiat, eros arcu pellentesque augue, at vehicula urna ipsum id risus. Phasellus et aliquet turpis. Vivamus feugiat pellentesque euismod. Ut pulvinar dolor orci, a pretium lorem consequat vitae.
                
                Curabitur posuere euismod accumsan. Donec bibendum lorem quis metus tempor, quis suscipit velit pharetra. Suspendisse potenti. Vivamus placerat interdum leo vitae ullamcorper. In sed molestie ex. Mauris scelerisque ante nec sapien pulvinar, at dignissim quam rhoncus. In laoreet diam id nisl vestibulum, sed consectetur mauris placerat. Donec ut risus vulputate, sollicitudin urna ut, tincidunt ex. Duis imperdiet magna at sollicitudin hendrerit. Nam varius mi velit, vitae aliquam augue lobortis vitae.
                
                Aenean tortor purus, ornare id eros at, blandit porttitor lacus. In tristique velit et nibh sodales imperdiet. Duis sit amet augue molestie, posuere leo eget, laoreet purus. Sed in mattis purus. Nunc aliquet elit a lacus ultrices egestas. Fusce mollis ipsum vitae mi. '
            ],
        ]);
    }

    #[Route("/post/add", name: 'post_add')]
    public function addPost(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);

        return $this->render('post/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
