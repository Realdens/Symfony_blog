<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/category', name: 'admin_category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        
        return $this->render('admin/category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route("/add", name:"add")]
     public function addCategory(Request $request, ManagerRegistry $doctrine): Response
    {
        //dd($request);
        
        $category = new Category();
        //dd($category);

        $form = $this->createForm(CategoryType::class, $category);
        //dd($form);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$em = $this->getDoctrine()->getManager();
            $em = $doctrine->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('admin_category_index');
        }

        return $this->render('admin/category/add.html.twig', [
            'form' => $form->createView(),
            'title' => 'Ajout d\'une catégorie',
        ]);        
    }

    #[Route("/update/{id}", name:"update")]
    public function updateCategory(Category $category, Request $request, ManagerRegistry $doctrine): Response
   {
       //dd($request);
       
       //$category = new Category();
       //dd($category);

       $form = $this->createForm(CategoryType::class, $category);
       //dd($form);

       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {
           //$em = $this->getDoctrine()->getManager();
           $em = $doctrine->getManager();
           $em->persist($category);
           $em->flush();
           return $this->redirectToRoute('admin_category_index');
       }

       return $this->render('admin/category/add.html.twig', [
           'form' => $form->createView(),
           'title' => 'Modification d\'une catégorie',
       ]);        
   }

   #[Route("/delete/{id}", name:"delete")]
    public function delete(Category $category, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($category);
        $em->flush();
        $this->addFlash('success', 'Catégorie supprimée !');
        return $this->redirectToRoute('admin_category_index');
    }
}
