<?php

function removeMarkdown($text) {
    // Remove headers
    $text = preg_replace('/^#{1,6}\s*(.+)$/m', '$1', $text);

    // Remove bold and italics
    $text = preg_replace('/(\*\*|__)(.*?)\1/', '$2', $text); // Bold
    $text = preg_replace('/(\*|_)(.*?)\1/', '$2', $text); // Italics

    // Remove inline code
    $text = preg_replace('/`([^`]*)`/', '$1', $text);

    // Remove block code
    $text = preg_replace('/```.*?```/s', '', $text);

    // Remove links
    $text = preg_replace('/\[(.*?)\]\((.*?)\)/', '$1', $text);

    // Remove images
    $text = preg_replace('/!\[(.*?)\]\((.*?)\)/', '', $text);

    // Remove blockquotes
    $text = preg_replace('/^>\s*(.+)$/m', '$1', $text);

    // Remove lists
    $text = preg_replace('/^(\s*[-*+]\s+|\d+\.\s+)(.+)$/m', '$2', $text);

    // Remove horizontal rules
    $text = preg_replace('/^-{3,}$/m', '', $text);

    return $text;
}

?>
