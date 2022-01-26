---
title: {{ trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($post->title)))))) }}
author: "{{ fake()->name }}"
date: {{ $post->published_at->format('Y-m-d H:i:s') }}
publishDate: {{ $post->published_at->format('Y-m-d') }}T{{ $post->published_at->format('H:i:s') }}Z
description: "{{ preg_replace('/[^a-zA-Z0-9\s]/', ' ', strip_tags(html_entity_decode(collect($post->ingredients['sentences'])->shuffle()->random()))) }}"
image: "{{ collect($post->ingredients['images'])->shuffle()->random()['image'] }}"
draft: false
hideToc: false
enableToc: false
enableTocContent: false
tocLevels: ["h2", "h3", "h4"]
author: {{ fake()->name }}
authorEmoji: ❤️ 
tags: 
- {{ collect(['trending', 'news', 'image', 'viral', 'trending news', 'viral news', 'uptodate news', 'favorite news', 'breaking news', 'viral images', 'trending images'])->random() }}
- {{ preg_replace('/[^a-zA-Z0-9\s]/', ' ', strip_tags(html_entity_decode($post->keyword))) }} {{ collect(['trending', 'news', 'image', 'viral'])->random() }}
categories: 
- "{{ $post->category }}"

---

{!! $post->content !!}